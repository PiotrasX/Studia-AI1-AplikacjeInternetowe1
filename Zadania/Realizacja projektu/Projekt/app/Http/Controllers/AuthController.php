<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Candidate;
use App\Models\Data;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Nie możesz się zalogować ponieważ jesteś już zalogowany.');
        }
        return view('auth.login');
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Nie możesz się zarejestrować ponieważ jesteś już zalogowany.');
        }
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home.index')->with('success', 'Pomyślnie wylogowano.');
        }

        return redirect()->back()->with('error', 'Nie możesz się wylogować ponieważ nie jesteś zalogowany.');
    }

    public function redirectToPreviousLogout()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Nie możesz się wylogować w ten sposób, użyj przycisku \'Wyloguj się\'.');
        }

        return redirect()->back()->with('error', 'Nie możesz się wylogować ponieważ nie jesteś zalogowany.');
    }

    private function validateLoginData(Request $request)
    {
        return $request->validate([
            'email' => 'required|string|min:4|max:255|email',
            'watchword' => 'required|string|min:4|max:255',
        ], [
            'email.required' => 'Pole \'Email\' nie może być puste.',
            'email.string' => 'Pole \'Email\' musi być ciągiem znaków.',
            'email.min' => 'Pole \'Email\' musi zawierać co najmniej 4 znaki.',
            'email.max' => 'Pole \'Email\' może zawierać maksymalnie 255 znaków.',
            'email.email' => 'Pole \'Email\' musi zawierać prawidłowy adres email.',

            'watchword.required' => 'Pole \'Hasło\' nie może być puste.',
            'watchword.string' => 'Pole \'Hasło\' musi być ciągiem znaków.',
            'watchword.min' => 'Pole \'Hasło\' musi zawierać co najmniej 4 znaki.',
            'watchword.max' => 'Pole \'Hasło\' może zawierać maksymalnie 255 znaków.',
        ]);
    }

    public function loginAuthenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Nie możesz się zalogować ponieważ jesteś już zalogowany.');
        }

        $credentials = $this->validateLoginData($request);
        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['watchword']], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home.index'))->with('success', 'Pomyślnie zalogowano.');
        } else {
            return back()->withErrors([
                'error_login' => 'Podany \'Email\' lub \'Hasło\' są nieprawidłowe.',
            ])->withInput($request->only('email', 'watchword'));
        }
    }

    private function validateRegisterData(Request $request)
    {
        return $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Mężczyzna,Kobieta',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|string|regex:/^[\d\+\-]+$/|min:9|max:15|unique:data',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'zip_code' => 'required|string|max:7|regex:/^\d{2}-\d{3}$/',
            'town' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'email' => 'required|string|min:4|max:255|email|unique:users',
            'watchword' => 'required|string|min:4|max:255|confirmed',
        ], [
            'first_name.required' => 'Pole \'Imię\' nie może być puste.',
            'first_name.string' => 'Pole \'Imię\' musi być ciągiem znaków.',
            'first_name.max' => 'Pole \'Imię\' może zawierać maksymalnie 255 znaków.',

            'last_name.required' => 'Pole \'Nazwisko\' nie może być puste.',
            'last_name.string' => 'Pole \'Nazwisko\' musi być ciągiem znaków.',
            'last_name.max' => 'Pole \'Nazwisko\' może zawierać maksymalnie 255 znaków.',

            'gender.required' => 'Pole \'Płeć\' nie może być puste.',
            'gender.in' => 'Pole \'Płeć\' musi być wartością \'Mężczyzna\' lub \'Kobieta\'.',

            'date_of_birth.required' => 'Pole \'Data urodzenia\' nie może być puste.',
            'date_of_birth.date' => 'Pole \'Data urodzenia\' musi być prawidłową datą.',

            'phone_number.required' => 'Pole \'Numer telefonu\' nie może być puste.',
            'phone_number.string' => 'Pole \'Numer telefonu\' musi być ciągiem znaków.',
            'phone_number.regex' => 'Pole \'Numer telefonu\' musi zawierać znaki numeryczne.',
            'phone_number.min' => 'Pole \'Numer telefonu\' musi zawierać co najmniej 9 znaków.',
            'phone_number.max' => 'Pole \'Numer telefonu\' może zawierać maksymalnie 15 znaków.',
            'phone_number.unique' => 'Podany numer telefonu jest już zajęty.',

            'street.required' => 'Pole \'Ulica\' nie może być puste.',
            'street.string' => 'Pole \'Ulica\' musi być ciągiem znaków.',
            'street.max' => 'Pole \'Ulica\' może zawierać maksymalnie 255 znaków.',

            'house_number.required' => 'Pole \'Numer domu\' nie może być puste.',
            'house_number.string' => 'Pole \'Numer domu\' musi być ciągiem znaków.',
            'house_number.max' => 'Pole \'Numer domu\' może zawierać maksymalnie 10 znaków.',

            'zip_code.required' => 'Pole \'Kod pocztowy\' nie może być puste.',
            'zip_code.string' => 'Pole \'Kod pocztowy\' musi być ciągiem znaków.',
            'zip_code.max' => 'Pole \'Kod pocztowy\' może zawierać maksymalnie 7 znaków.',
            'zip_code.regex' => 'Pole \'Kod pocztowy\' musi być w formacie XX-XXX, gdzie X to dowolna cyfra.',

            'town.required' => 'Pole \'Miasto\' nie może być puste.',
            'town.string' => 'Pole \'Miasto\' musi być ciągiem znaków.',
            'town.max' => 'Pole \'Miasto\' może zawierać maksymalnie 255 znaków.',

            'father_name.required' => 'Pole \'Imię ojca\' nie może być puste.',
            'father_name.string' => 'Pole \'Imię ojca\' musi być ciągiem znaków.',
            'father_name.max' => 'Pole \'Imię ojca\' może zawierać maksymalnie 255 znaków.',

            'mother_name.required' => 'Pole \'Imię matki\' nie może być puste.',
            'mother_name.string' => 'Pole \'Imię matki\' musi być ciągiem znaków.',
            'mother_name.max' => 'Pole \'Imię matki\' może zawierać maksymalnie 255 znaków.',

            'email.required' => 'Pole \'Email\' nie może być puste.',
            'email.string' => 'Pole \'Email\' musi być ciągiem znaków.',
            'email.min' => 'Pole \'Email\' musi zawierać co najmniej 4 znaki.',
            'email.max' => 'Pole \'Email\' może zawierać maksymalnie 255 znaków.',
            'email.email' => 'Pole \'Email\' musi zawierać prawidłowy adres email.',
            'email.unique' => 'Podany adres email jest już zajęty.',

            'watchword.required' => 'Pole \'Hasło\' nie może być puste.',
            'watchword.string' => 'Pole \'Hasło\' musi być ciągiem znaków.',
            'watchword.min' => 'Pole \'Hasło\' musi zawierać co najmniej 4 znaki.',
            'watchword.max' => 'Pole \'Hasło\' może zawierać maksymalnie 255 znaków.',
            'watchword.confirmed' => 'Podane hasła nie są identyczne.',
        ]);
    }

    public function registerAuthenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Nie możesz się zarejestrować ponieważ jesteś już zalogowany.');
        }

        $credentials = $this->validateRegisterData($request);
        DB::beginTransaction();
        try {
            $data = Data::create([
                'first_name' => $credentials['first_name'],
                'last_name' => $credentials['last_name'],
                'gender' => $credentials['gender'],
                'date_of_birth' => $credentials['date_of_birth'],
                'phone_number' => $credentials['phone_number'],
                'street' => $credentials['street'],
                'house_number' => $credentials['house_number'],
                'zip_code' => $credentials['zip_code'],
                'town' => $credentials['town'],
                'father_name' => $credentials['father_name'],
                'mother_name' => $credentials['mother_name'],
            ]);

            $user = User::create([
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['watchword']),
                'data_id' => $data->id,
                'role_id' => 3,
            ]);

            $photo = 'man_photo.png';
            if ($data->gender === 'Kobieta') {
                $photo = 'woman_photo.png';
            }

            Candidate::create([
                'user_id' => $user->id,
                'photo' => $photo,
                'account_balance' => 0,
                'result_math' => 0,
                'result_polish_language' => 0,
                'result_english_language' => 0,
                'name_fourth_subject' => 'Brak',
                'result_fourth_subject' => 0,
            ]);

            DB::commit();
            Auth::login($user);
            return redirect()->intended(route('home.index'))->with('success', 'Pomyślnie zarejestrowano.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Wystąpił błąd podczas rejestracji. Spróbuj ponownie później.');
        }
    }
}

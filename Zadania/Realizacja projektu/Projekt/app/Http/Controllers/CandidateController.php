<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Registration;
use App\Models\Candidate;
use Carbon\Carbon;

class CandidateController extends Controller
{
    public function redirectToHome()
    {
        return redirect()->route('home.index')->with('error', 'Nie możesz w ten sposób wykonać tej operacji.');
    }

    public static function candidatePoints($candidate)
    {
        return [
            'Matematyka' => $candidate->result_math,
            'Język polski' => $candidate->result_polish_language,
            'Język angielski' => $candidate->result_english_language,
            'Biologia' => $candidate->name_fourth_subject == 'Biologia' ? $candidate->result_fourth_subject : 0,
            'Chemia' => $candidate->name_fourth_subject == 'Chemia' ? $candidate->result_fourth_subject : 0,
            'Fizyka' => $candidate->name_fourth_subject == 'Fizyka' ? $candidate->result_fourth_subject : 0,
            'Geografia' => $candidate->name_fourth_subject == 'Geografia' ? $candidate->result_fourth_subject : 0,
            'Historia' => $candidate->name_fourth_subject == 'Historia' ? $candidate->result_fourth_subject : 0,
        ];
    }

    public static function getRegistrationsByProfileId($id)
    {
        return DB::table('registrations')
            ->where('profile_id', $id)
            ->join('candidates', 'registrations.candidate_id', '=', 'candidates.id')
            ->join('users', 'candidates.user_id', '=', 'users.id')
            ->join('data', 'users.data_id', '=', 'data.id')
            ->select('registrations.*', 'data.first_name', 'data.last_name', 'data.gender')
            ->orderBy('point_score', 'desc')
            ->orderBy('date_of_submission', 'asc')
            ->get();
    }

    public function profileRegister($id)
    {
        $user = Auth::user();

        if (!CandidateController::checkCandidateExamDetails($user)) {
            return redirect()->route('candidate.completeTheExamDetails')->with('error', 'Nie masz uzupełnionych wszystkich danych. Uzupełnij brakujące dane.');
        }

        $userRegistrations = HomeController::getUserRegistrations();

        if (empty($userRegistrations)) {
            $profile = Profile::findOrFail($id);

            if ($profile->open_recruitment === false) {
                return redirect()->route('home.profiles')->with('error', 'Rekturacja na ten profil została zakończona.');
            }

            $userId = Auth::id();
            $candidate = DB::table('candidates')->where('user_id', $userId)->first();
            $registrationsCount = HomeController::getRegistrationsCount();
            $subjectsAndWeight = HomeController::subjectsAndWeight($profile);
            $candidatePoints = CandidateController::candidatePoints($candidate);
            $registrationsByProfileId = CandidateController::getRegistrationsByProfileId($id);
            $highlightUser = null;

            return view('candidate.profile-register', compact('profile', 'registrationsCount', 'candidate', 'subjectsAndWeight', 'candidatePoints', 'registrationsByProfileId', 'highlightUser'));
        }
        return redirect()->route('home.profiles')->with('error', 'Jesteś już zarejestrowany na inny kierunek.');
    }

    public static function calculatePointScore($candidate, $profile)
    {
        $score = 0;

        $score += $candidate->result_math * $profile->weight_math;
        $score += $candidate->result_polish_language * $profile->weight_polish_language;
        $score += $candidate->result_english_language * $profile->weight_english_language;

        $weight_fourth_subject = match ($candidate->name_fourth_subject) {
            'Biologia' => $profile->weight_biology,
            'Fizyka' => $profile->weight_physics,
            'Geografia' => $profile->weight_geography,
            'Historia' => $profile->weight_history,
            'Chemia' => $profile->weight_chemistry,
            default => 0
        };

        $score += $candidate->result_fourth_subject * $weight_fourth_subject;

        return $score;
    }

    public function redirectToPreviousProfileRegisterSend()
    {
        return redirect()->back()->with('error', 'Nie możesz w ten sposób wykonać tej operacji.');
    }

    public function profileRegisterSend(Request $request)
    {
        $user = Auth::user();

        if (!CandidateCOntroller::checkCandidateExamDetails($user)) {
            return redirect()->route('candidate.completeTheExamDetails')->with('error', 'Nie masz uzupełnionych wszystkich danych. Uzupełnij brakujące dane.');
        }

        $userRegistrations = HomeController::getUserRegistrations();

        if (empty($userRegistrations)) {
            $profile = Profile::find($request->profile_id);

            if (!$profile) {
                return redirect()->back()->with('error', 'Nie możesz się zarejestrować na nie istniejący profil.');
            }

            if ($profile->open_recruitment === false) {
                return redirect()->route('home.profiles')->with('error', 'Rekturacja na ten profil została zakończona.');
            }

            DB::beginTransaction();
            try {
                $userId = Auth::id();
                $candidate = DB::table('candidates')->where('user_id', $userId)->first();
                $score = CandidateController::calculatePointScore($candidate, $profile);

                Registration::create([
                    'candidate_id' => $candidate->id,
                    'date_of_submission' => Carbon::now(),
                    'profile_id' => $profile->id,
                    'total_paid' => 0,
                    'point_score' => $score,
                ]);

                DB::commit();
                return redirect()->route('home.profiles')->with('success', 'Pomyślnie zarejestrowano na profil.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('home.profiles')->with('error', 'Wystąpił błąd podczas rejestracji na profil. Spróbuj ponownie później.');
            }
        }
        return redirect()->route('home.profiles')->with('error', 'Jesteś już zarejestrowany na inny kierunek.');
    }

    public static function checkCandidateExamDetails($user)
    {
        if ($user) {
            $candidate = DB::table('candidates')
                ->where('user_id', $user->id)
                ->whereIn('name_fourth_subject', ['Historia', 'Biologia', 'Chemia', 'Fizyka', 'Geografia'])
                ->first();

            if ($candidate) {
                return true;
            }
        }

        return false;
    }

    private function validateCompleteTheExamDetailsData(Request $request)
    {
        return $request->validate([
            'result_math' => 'required|integer|min:0|max:100',
            'result_polish_language' => 'required|integer|min:0|max:100',
            'result_english_language' => 'required|integer|min:0|max:100',
            'result_fourth_subject' => 'required|integer|min:0|max:100',
            'name_fourth_subject' => 'required|in:Historia,Biologia,Chemia,Fizyka,Geografia',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'result_math.required' => 'Pole \'Matematyka\' nie może być puste.',
            'result_math.integer' => 'Pole \'Matematyka\' musi być liczbą całkowitą.',
            'result_math.min' => 'Pole \'Matematyka\' musi wynosić minimalnie 0.',
            'result_math.max' => 'Pole \'Matematyka\' może wynosić maksymalnie 100.',

            'result_polish_language.required' => 'Pole \'Język Polski\' nie może być puste.',
            'result_polish_language.integer' => 'Pole \'Język Polski\' musi być liczbą całkowitą.',
            'result_polish_language.min' => 'Pole \'Język Polski\' musi wynosić minimalnie 0.',
            'result_polish_language.max' => 'Pole \'Język Polski\' może wynosić maksymalnie 100.',

            'result_english_language.required' => 'Pole \'Język Angielski\' nie może być puste.',
            'result_english_language.integer' => 'Pole \'Język Angielski\' musi być liczbą całkowitą.',
            'result_english_language.min' => 'Pole \'Język Angielski\' musi wynosić minimalnie 0.',
            'result_english_language.max' => 'Pole \'Język Angielski\' może wynosić maksymalnie 100.',

            'result_fourth_subject.required' => 'Pole \'Czwarty przedmiot\' nie może być puste.',
            'result_fourth_subject.integer' => 'Pole \'Czwarty przedmiot\' musi być liczbą całkowitą.',
            'result_fourth_subject.min' => 'Pole \'Czwarty przedmiot\' musi wynosić minimalnie 0.',
            'result_fourth_subject.max' => 'Pole \'Czwarty przedmiot\' może wynosić maksymalnie 100.',

            'name_fourth_subject.required' => 'Pole \'Nazwa czwartego przedmiotu\' nie może być puste.',
            'name_fourth_subject.in' => 'Pole \'Nazwa czwartego przedmiotu\' musi być wartością \'Biologia\', \'Chemia\', \'Fizyka\', \'Geografia\' lub \'Historia\'.',

            'photo.image' => 'Pole \'Zdjęcie\' musi być plikiem graficznym.',
            'photo.mimes' => 'Pole \'Zdjęcie\' musi być plikiem typu jpg, jpeg lub png.',
            'photo.max' => 'Pole \'Zdjęcie\' nie może przekraczać 2MB.',
        ]);
    }

    public function completeTheExamDetailsAuthenticate(Request $request)
    {
        $user = Auth::user();

        if (CandidateCOntroller::checkCandidateExamDetails($user)) {
            return redirect()->back()->with('success', 'Masz uzupełnione wszystkie dane.');
        }

        $credentials = $this->validateCompleteTheExamDetailsData($request);
        DB::beginTransaction();
        try {
            $data = [
                'result_math' => $credentials['result_math'],
                'result_polish_language' => $credentials['result_polish_language'],
                'result_english_language' => $credentials['result_english_language'],
                'name_fourth_subject' => $credentials['name_fourth_subject'],
                'result_fourth_subject' => $credentials['result_fourth_subject'],
            ];

            $candidate = Candidate::where('user_id', $user->id)->first();
            if ($request->hasFile('photo')) {
                if ($candidate && $candidate->photo && !in_array($candidate->photo, ['man_photo.png', 'woman_photo.png'])) {
                    Storage::disk('public')->delete('img/candidate/' . $candidate->photo);
                }

                $photo = $request->file('photo')->store('img/candidate', 'public');
                $data['photo'] = basename($photo);
            }

            Candidate::updateOrCreate(
                ['user_id' => $user->id],
                $data
            );

            DB::commit();
            Auth::login($user);
            return redirect()->intended(route('candidate.profile'))->with('success', 'Pomyślnie uzupełniono dane.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Wystąpił błąd uzupełniania danych. Spróbuj ponownie później.');
        }
    }

    public function completeTheExamDetails()
    {
        $user = Auth::user();

        if (CandidateCOntroller::checkCandidateExamDetails($user)) {
            return redirect()->back()->with('success', 'Masz uzupełnione wszystkie dane.');
        }

        return view('candidate.complete-the-exam-details');
    }

    protected function createCandidateForUser($user)
    {
        DB::beginTransaction();

        $photo = 'man_photo.png';
        if ($user->data->gender === 'Kobieta') {
            $photo = 'woman_photo.png';
        }

        $candidate = Candidate::create([
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

        return $candidate;
    }

    public function profile()
    {
        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->with(['user.data'])->first();

        if (!$candidate) {
            $candidate = $this->createCandidateForUser($user);
        }

        if (!CandidateController::checkCandidateExamDetails($user)) {
            return redirect()->route('candidate.completeTheExamDetails')->with('error', 'Nie masz uzupełnionych wszystkich danych. Uzupełnij brakujące dane.');
        }

        if (($candidate->photo && !Storage::disk('public')->exists('img/candidate/' . $candidate->photo)) || $candidate->photo === 'man_photo.png' || $candidate->photo === 'woman_photo.png') {
            $candidate->photo = 'man_photo.png';
            if ($candidate->user->data->gender === "Kobieta") {
                $candidate->photo = 'woman_photo.png';
            }
        }

        $userRegistrations = HomeController::getUserRegistrations();
        $ifUserRegistrations = true;
        if (empty($userRegistrations)) {
            $ifUserRegistrations = false;
        }

        if ($ifUserRegistrations) {
            $registration = Registration::where('candidate_id', $candidate->id)->firstOrFail();
            $profile = Profile::findOrFail($registration->profile_id);
            $userId = Auth::id();
            $registrationsCount = HomeController::getRegistrationsCount();
            $subjectsAndWeight = HomeController::subjectsAndWeight($profile);
            $candidatePoints = CandidateController::candidatePoints($candidate);
            $registrationsByProfileId = CandidateController::getRegistrationsByProfileId($registration->profile_id);
            $highlightUser = $candidate->id;

            return view('candidate.profile', compact('candidate', 'ifUserRegistrations', 'profile', 'registrationsCount', 'candidate', 'subjectsAndWeight', 'candidatePoints', 'registrationsByProfileId', 'highlightUser', 'registration'));
        }

        return view('candidate.profile', compact('candidate', 'ifUserRegistrations'));
    }

    public function settings()
    {
        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->with(['user.data'])->first();

        if (!$candidate) {
            $candidate = $this->createCandidateForUser($user);
        }

        if (!CandidateController::checkCandidateExamDetails($user)) {
            return redirect()->route('candidate.completeTheExamDetails')->with('error', 'Nie masz uzupełnionych wszystkich danych. Uzupełnij brakujące dane.');
        }

        $dateOfBirth = $candidate->user->data->date_of_birth ? Carbon::parse($candidate->user->data->date_of_birth)->format('Y-m-d') : '';

        if (($candidate->photo && !Storage::disk('public')->exists('img/candidate/' . $candidate->photo)) || $candidate->photo === 'man_photo.png' || $candidate->photo === 'woman_photo.png') {
            $candidate->photo = 'man_photo.png';
            if ($candidate->user->data->gender === "Kobieta") {
                $candidate->photo = 'woman_photo.png';
            }
        }

        return view('candidate.settings', compact('candidate', 'dateOfBirth'));
    }

    public static function calculateCandidatePointScore($candidate, $profile)
    {
        $score = 0;

        $score += $candidate->result_math * $profile->weight_math;
        $score += $candidate->result_polish_language * $profile->weight_polish_language;
        $score += $candidate->result_english_language * $profile->weight_english_language;

        $weight_fourth_subject = match ($candidate->name_fourth_subject) {
            'Biologia' => $profile->weight_biology,
            'Fizyka' => $profile->weight_physics,
            'Geografia' => $profile->weight_geography,
            'Historia' => $profile->weight_history,
            'Chemia' => $profile->weight_chemistry,
            default => 0
        };

        $score += $candidate->result_fourth_subject * $weight_fourth_subject;

        return $score;
    }

    public static function validateSettingsData(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Mężczyzna,Kobieta',
            'date_of_birth' => 'required|date|before_or_equal:' . Carbon::now()->subYears(10)->format('Y-m-d'),
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'zip_code' => 'required|string|max:7|regex:/^\d{2}-\d{3}$/',
            'town' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'result_math' => 'required|integer|min:0|max:100',
            'result_polish_language' => 'required|integer|min:0|max:100',
            'result_english_language' => 'required|integer|min:0|max:100',
            'result_fourth_subject' => 'required|integer|min:0|max:100',
            'name_fourth_subject' => 'required|in:Historia,Biologia,Chemia,Fizyka,Geografia',
            'new_candidate_photo' => 'sometimes|nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'remove_candidate_photo' => 'sometimes|accepted',
        ];

        if ($request->has('change_password_checkbox')) {
            $rules['watchword'] = 'required|string|min:4|max:255|confirmed';

            $request->session()->put('change_password_checkbox', true);
        }

        $tenYearsAgo = Carbon::now()->subYears(10)->format('Y-m-d');

        $messages = [
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
            'date_of_birth.before_or_equal' => 'Pole \'Data urodzenia\' musi być datą wcześniejszą lub równą ' . $tenYearsAgo . '.',

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

            'result_math.required' => 'Pole \'Matematyka\' nie może być puste.',
            'result_math.integer' => 'Pole \'Matematyka\' musi być liczbą całkowitą.',
            'result_math.min' => 'Pole \'Matematyka\' musi wynosić minimalnie 0.',
            'result_math.max' => 'Pole \'Matematyka\' może wynosić maksymalnie 100.',

            'result_polish_language.required' => 'Pole \'Język Polski\' nie może być puste.',
            'result_polish_language.integer' => 'Pole \'Język Polski\' musi być liczbą całkowitą.',
            'result_polish_language.min' => 'Pole \'Język Polski\' musi wynosić minimalnie 0.',
            'result_polish_language.max' => 'Pole \'Język Polski\' może wynosić maksymalnie 100.',

            'result_english_language.required' => 'Pole \'Język Angielski\' nie może być puste.',
            'result_english_language.integer' => 'Pole \'Język Angielski\' musi być liczbą całkowitą.',
            'result_english_language.min' => 'Pole \'Język Angielski\' musi wynosić minimalnie 0.',
            'result_english_language.max' => 'Pole \'Język Angielski\' może wynosić maksymalnie 100.',

            'result_fourth_subject.required' => 'Pole \'Czwarty przedmiot\' nie może być puste.',
            'result_fourth_subject.integer' => 'Pole \'Czwarty przedmiot\' musi być liczbą całkowitą.',
            'result_fourth_subject.min' => 'Pole \'Czwarty przedmiot\' musi wynosić minimalnie 0.',
            'result_fourth_subject.max' => 'Pole \'Czwarty przedmiot\' może wynosić maksymalnie 100.',

            'name_fourth_subject.required' => 'Pole \'Nazwa czwartego przedmiotu\' nie może być puste.',
            'name_fourth_subject.in' => 'Pole \'Nazwa czwartego przedmiotu\' musi być wartością \'Biologia\', \'Chemia\', \'Fizyka\', \'Geografia\' lub \'Historia\'.',

            'new_candidate_photo.sometimes' => 'Pole \'Zdjęcie\' jest opcjonalne.',
            'new_candidate_photo.file' => 'Pole \'Zdjęcie\' musi być plikiem.',
            'new_candidate_photo.image' => 'Pole \'Zdjęcie\' musi być plikiem graficznyym.',
            'new_candidate_photo.mimes' => 'Pole \'Zdjęcie\' musi być plikiem typu jpg, jpeg lub png.',
            'new_candidate_photo.max' => 'Pole \'Zdjęcie\' nie może przekraczać 2MB.',

            'remove_candidate_photo.sometimes' => 'Checkbox \'Usuń zdjęcie\' jest opcjonalne.',
            'remove_candidate_photo.accepted' => 'Checkbox \'Usuń zdjęcie\' musi być zaznaczone.',

            'watchword.required' => 'Pole \'Hasło\' nie może być puste.',
            'watchword.string' => 'Pole \'Hasło\' musi być ciągiem znaków.',
            'watchword.min' => 'Pole \'Hasło\' musi zawierać co najmniej 4 znaki.',
            'watchword.max' => 'Pole \'Hasło\' może zawierać maksymalnie 255 znaków.',
            'watchword.confirmed' => 'Podane hasła nie są identyczne.',
        ];

        return $request->validate($rules, $messages);
    }

    public static function updateUserData($data, $validatedData)
    {
        $data->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'street' => $validatedData['street'],
            'house_number' => $validatedData['house_number'],
            'zip_code' => $validatedData['zip_code'],
            'town' => $validatedData['town'],
            'father_name' => $validatedData['father_name'],
            'mother_name' => $validatedData['mother_name']
        ]);
    }

    public static function updateCandidateData($candidate, $validatedData)
    {
        $candidate->update([
            'result_math' => $validatedData['result_math'],
            'result_polish_language' => $validatedData['result_polish_language'],
            'result_english_language' => $validatedData['result_english_language'],
            'result_fourth_subject' => $validatedData['result_fourth_subject'],
            'name_fourth_subject' => $validatedData['name_fourth_subject'],
        ]);
    }

    public static function manageCandidatePhoto($candidate, $request)
    {
        $removePhoto = $request->has('remove_candidate_photo');
        $newPhoto = $request->file('new_candidate_photo');

        // Checkbox nie zaznaczony, brak nowego zdjęcia
        if (!$removePhoto) {
            if (($candidate->photo && !Storage::disk('public')->exists('img/candidate/' . $candidate->photo)) || $candidate->photo === 'man_photo.png' || $candidate->photo === 'woman_photo.png') {
                $candidate->photo = 'man_photo.png';
                if ($candidate->user->data->gender === "Kobieta") {
                    $candidate->photo = 'woman_photo.png';
                }
            }

            // Checkbox nie zaznaczony, nowe zdjęcie przesłane
            if ($newPhoto) {
                if ($candidate->photo === 'man_photo.png' || $candidate->photo === 'woman_photo.png') {
                    $photoPath = $newPhoto->store('img/candidate', 'public');
                    $candidate->photo = basename($photoPath);
                } else {
                    return false;
                }
            }
        }

        // Checkbox zaznaczony, brak nowego zdjęcia
        if ($removePhoto && !$newPhoto) {
            if ($candidate->photo && Storage::disk('public')->exists('img/candidate/' . $candidate->photo) && $candidate->photo !== 'man_photo.png' && $candidate->photo !== 'woman_photo.png') {
                Storage::disk('public')->delete('img/candidate/' . $candidate->photo);
            }

            $candidate->photo = 'man_photo.png';
            if ($candidate->user->data->gender === "Kobieta") {
                $candidate->photo = 'woman_photo.png';
            }
        }

        // Checkbox zaznaczony, nowe zdjęcie przesłane
        if ($removePhoto && $newPhoto) {
            if ($candidate->photo && Storage::disk('public')->exists('img/candidate/' . $candidate->photo) && $candidate->photo !== 'man_photo.png' && $candidate->photo !== 'woman_photo.png') {
                Storage::disk('public')->delete('img/candidate/' . $candidate->photo);
            }

            $photoPath = $newPhoto->store('img/candidate', 'public');
            $candidate->photo = basename($photoPath);
        }

        $candidate->save();
        return true;
    }

    public function settingsAuthenticate(Request $request)
    {
        $user = Auth::user();
        $candidate = Candidate::where('user_id', $user->id)->firstOrFail();
        $data = $user->data;

        $validatedData = CandidateController::validateSettingsData($request);
        DB::beginTransaction();
        try {
            if ($request->has('change_password_checkbox')) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($validatedData['watchword'])]);

                $request->session()->put('change_password_checkbox', false);
            }

            $this->updateUserData($data, $validatedData);
            $this->updateCandidateData($candidate, $validatedData);

            $registration = Registration::where('candidate_id', $candidate->id)->first();

            if ($registration) {
                $profile = Profile::where('id', $registration->profile_id)->firstOrFail();
                $point_score = $this->calculateCandidatePointScore($candidate, $profile);

                $registration->update([
                    'point_score' => $point_score
                ]);
            }

            $validatedNewPhoto = $this->manageCandidatePhoto($candidate, $request);
            if (!$validatedNewPhoto) {
                DB::commit();
                return redirect()->back()->with('error', 'Nie możesz przesłać nowego zdjęcia, jeśli nie chcesz usunąć starego zdjęcia.');
            }

            DB::commit();
            return redirect()->intended(route('candidate.profile'))->with('success', 'Pomyślnie edytowano dane.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Wystąpił błąd edytowania danych. Spróbuj ponownie później.');
        }
    }

    public function payTheEntryFee(Request $request)
    {
        $user = Auth::user();
        $amount = $request->input('amount');
        $candidate = Candidate::where('user_id', $user->id)->first();

        if ($candidate) {
            if ($candidate->account_balance >= $amount) {
                $registration = Registration::where('candidate_id', $candidate->id)->first();

                if ($registration) {
                    $candidate->account_balance -= $amount;
                    $candidate->save();

                    $registration->total_paid += $amount;
                    $registration->save();

                    return redirect()->route('candidate.profile')->with('success', 'Pomyślnie wpłacono wpisowe.');
                } else {
                    return redirect()->route('candidate.profile')->with('error', 'Nie odnaleziono twojej rejestracji na ten profil.');
                }
            } else {
                return redirect()->route('candidate.profile')->with('error', 'Brak odpowiednich środków na koncie.');
            }
        } else {
            return redirect()->route('candidate.profile')->with('error', 'Nie odnaleziono profilu kandydata przypisanego do twojego konta.');
        }
    }

    public function topUp(Request $request)
    {
        $user = Auth::user();
        $amount = $request->input('amount');
        $candidate = Candidate::where('user_id', $user->id)->first();

        if ($candidate) {
            $candidate->account_balance += $amount;
            $candidate->save();

            return redirect()->route('candidate.profile')->with('success', 'Twoje konto zostało pomyślnie doładowane.');
        } else {
            return redirect()->route('candidate.profile')->with('error', 'Nie odnaleziono profilu kandydata przypisanego do twojego konta.');
        }
    }
}

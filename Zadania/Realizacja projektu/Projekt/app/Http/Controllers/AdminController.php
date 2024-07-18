<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Registration;
use App\Models\Candidate;
use App\Models\Profile;
use App\Models\Subject;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function profiles()
    {
        if (Auth::user()->role_id == 1) {
            $profiles = Profile::with(['subjectExtended1', 'subjectExtended2', 'subjectExtended3'])->get();
            $registrationsCount = HomeController::getRegistrationsCount();

            return view('admin.profiles', compact('profiles', 'registrationsCount'));
        }

        return redirect()->route('home.index')->with('error', 'Nie masz dostępu do tej strony.');
    }

    public function profileCreate()
    {
        if (Auth::user()->role_id == 1) {
            $subjects = Subject::get();

            return view('admin.create-profile', compact('subjects'));
        }

        return redirect()->route('home.index')->with('error', 'Nie masz dostępu do tej strony.');
    }

    private function validateProfileData(Request $request, $photoRequired)
    {
        $rules = [
            'name' => 'required|string|min:5|max:255',
            'subject_extended1' => 'required|in:Informatyka,Fizyka,Chemia,Biologia,Geografia,Historia,Matematyka,Wiedza o społeczeństwie,Język angielski,Język włoski,Język niemiecki,Język polski',
            'hours_subject_extended1' => 'required|integer|min:10|max:60',
            'subject_extended2' => 'required|in:Informatyka,Fizyka,Chemia,Biologia,Geografia,Historia,Matematyka,Wiedza o społeczeństwie,Język angielski,Język włoski,Język niemiecki,Język polski',
            'hours_subject_extended2' => 'required|integer|min:10|max:60',
            'subject_extended3' => 'required|in:Informatyka,Fizyka,Chemia,Biologia,Geografia,Historia,Matematyka,Wiedza o społeczeństwie,Język angielski,Język włoski,Język niemiecki,Język polski',
            'hours_subject_extended3' => 'required|integer|min:10|max:60',
            'number_of_seats' => 'required|integer|min:1|max:15',
            'entry_fee' => 'required|integer|min:1|max:2500',
            'weight_math' => 'required|numeric|between:0,1',
            'weight_polish_language' => 'required|numeric|between:0,1',
            'weight_english_language' => 'required|numeric|between:0,1',
            'weight_biology' => 'required|numeric|between:0,1',
            'weight_chemistry' => 'required|numeric|between:0,1',
            'weight_physics' => 'required|numeric|between:0,1',
            'weight_geography' => 'required|numeric|between:0,1',
            'weight_history' => 'required|numeric|between:0,1',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ];

        if ($photoRequired) {
            $rules['photo'] = 'required|image|mimes:jpg,jpeg,png|max:4096';
        } else {
            $rules['photo'] = 'nullable|image|mimes:jpg,jpeg,png|max:4096';
        }

        $messages = [
            'name.required' => 'Pole \'Nazwa\' nie może być puste.',
            'name.string' => 'Pole \'Nazwa\' musi być ciągiem znaków.',
            'name.min' =>  'Pole \'Nazwa\' musi zawierać co najmniej 5 znaków.',
            'name.max' => 'Pole \'Nazwa\' może zawierać maksymalnie 255 znaków.',

            'subject_extended1.required' => 'Pole \'Przedmiot rozszerzony 1\' nie może być puste.',
            'subject_extended1.in' => 'Pole \'Przedmiot rozszerzony 1\' musi być wartością wybraną z listy.',

            'hours_subject_extended1.required' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 1\' nie może być puste.',
            'hours_subject_extended1.integer' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 1\' musi być liczbą całkowitą.',
            'hours_subject_extended1.min' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 1\' musi wynosić minimalnie 10.',
            'hours_subject_extended1.max' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 1\' może wynosić maksymalnie 60.',

            'subject_extended2.required' => 'Pole \'Przedmiot rozszerzony 2\' nie może być puste.',
            'subject_extended2.in' => 'Pole \'Przedmiot rozszerzony 2\' musi być wartością wybraną z listy.',

            'hours_subject_extended2.required' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 2\' nie może być puste.',
            'hours_subject_extended2.integer' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 2\' musi być liczbą całkowitą.',
            'hours_subject_extended2.min' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 2\' musi wynosić minimalnie 10.',
            'hours_subject_extended2.max' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 2\' może wynosić maksymalnie 60.',

            'subject_extended3.required' => 'Pole \'Przedmiot rozszerzony 2\' nie może być puste.',
            'subject_extended3.in' => 'Pole \'Przedmiot rozszerzony 2\' musi być wartością wybraną z listy.',

            'hours_subject_extended3.required' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 3\' nie może być puste.',
            'hours_subject_extended3.integer' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 3\' musi być liczbą całkowitą.',
            'hours_subject_extended3.min' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 3\' musi wynosić minimalnie 10.',
            'hours_subject_extended3.max' => 'Pole \'Liczba godzin przedmiotu rozszerzonego 3\' może wynosić maksymalnie 60.',

            'number_of_seats.required' => 'Pole \'Liczba miejsc\' nie może być puste.',
            'number_of_seats.integer' => 'Pole \'Liczba miejsc\' musi być liczbą całkowitą.',
            'number_of_seats.min' => 'Pole \'Liczba miejsc\' musi wynosić minimalnie 1.',
            'number_of_seats.max' => 'Pole \'Liczba miejsc\' może wynosić maksymalnie 15.',

            'entry_fee.required' => 'Pole \'Wpisowe\' nie może być puste.',
            'entry_fee.integer' => 'Pole \'Wpisowe\' musi być liczbą całkowitą.',
            'entry_fee.min' => 'Pole \'Wpisowe\' musi wynosić minimalnie 1.',
            'entry_fee.max' => 'Pole \'Wpisowe\' może wynosić maksymalnie 2500.',

            'weight_math.required' => 'Pole \'Matematyka\' nie może być puste.',
            'weight_math.numeric' => 'Pole \'Matematyka\' musi być liczbą.',
            'weight_math.between' => 'Pole \'Matematyka\' musi mieć wartość od 0.00 do 1.00.',

            'weight_polish_language.required' => 'Pole \'Język polski\' nie może być puste.',
            'weight_polish_language.numeric' => 'Pole \'Język polski\' musi być liczbą.',
            'weight_polish_language.between' => 'Pole \'Język polski\' musi mieć wartość od 0.00 do 1.00.',

            'weight_english_language.required' => 'Pole \'Język angielski\' nie może być puste.',
            'weight_english_language.numeric' => 'Pole \'Język angielski\' musi być liczbą.',
            'weight_english_language.between' => 'Pole \'Język angielski\' musi mieć wartość od 0.00 do 1.00.',

            'weight_biology.required' => 'Pole \'Biologia\' nie może być puste.',
            'weight_biology.numeric' => 'Pole \'Biologia\' musi być liczbą.',
            'weight_biology.between' => 'Pole \'Biologia\' musi mieć wartość od 0.00 do 1.00.',

            'weight_chemistry.required' => 'Pole \'Chemia\' nie może być puste.',
            'weight_chemistry.numeric' => 'Pole \'Chemia\' musi być liczbą.',
            'weight_chemistry.between' => 'Pole \'Chemia\' musi mieć wartość od 0.00 do 1.00.',

            'weight_physics.required' => 'Pole \'Fizyka\' nie może być puste.',
            'weight_physics.numeric' => 'Pole \'Fizyka\' musi być liczbą.',
            'weight_physics.between' => 'Pole \'Fizyka\' musi mieć wartość od 0.00 do 1.00.',

            'weight_geography.required' => 'Pole \'Geografia\' nie może być puste.',
            'weight_geography.numeric' => 'Pole \'Geografia\' musi być liczbą.',
            'weight_geography.between' => 'Pole \'Geografia\' musi mieć wartość od 0.00 do 1.00.',

            'weight_history.required' => 'Pole \'Historia\' nie może być puste.',
            'weight_history.numeric' => 'Pole \'Historia\' musi być liczbą.',
            'weight_history.between' => 'Pole \'Historia\' musi mieć wartość od 0.00 do 1.00.',

            'photo.required' => 'Pole \'Zdjęcie\' nie może być puste.',
            'photo.image' => 'Pole \'Zdjęcie\' musi być plikiem graficznym.',
            'photo.mimes' => 'Pole \'Zdjęcie\' musi być plikiem typu jpg, jpeg lub png.',
            'photo.max' => 'Pole \'Zdjęcie\' nie może przekraczać 4MB.',
        ];

        return $request->validate($rules, $messages);
    }

    public function profileCreateAuthenticate(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $validatedData = $this->validateProfileData($request, true);

            $subject1 = Subject::where('name', $validatedData['subject_extended1'])->first();
            $subject2 = Subject::where('name', $validatedData['subject_extended2'])->first();
            $subject3 = Subject::where('name', $validatedData['subject_extended3'])->first();

            if (!$subject1 || !$subject2 || !$subject3) {
                return redirect()->back()->with('error', 'Nie znaleziono jednego lub więcej przedmiotów. Sprawdź poprawność danych.');
            }
            DB::beginTransaction();
            try {
                if ($request->hasFile('photo')) {
                    $photoPath = $request->file('photo')->store('img/profiles', 'public');
                    $photoPath = basename($photoPath);
                }

                Profile::create([
                    'name' => $validatedData['name'],
                    'subject_extended1_id' => $subject1->id,
                    'hours_subject_extended1' => $validatedData['hours_subject_extended1'],
                    'subject_extended2_id' => $subject2->id,
                    'hours_subject_extended2' => $validatedData['hours_subject_extended2'],
                    'subject_extended3_id' => $subject3->id,
                    'hours_subject_extended3' => $validatedData['hours_subject_extended3'],
                    'number_of_seats' => $validatedData['number_of_seats'],
                    'entry_fee' => $validatedData['entry_fee'],
                    'weight_math' => $validatedData['weight_math'],
                    'weight_polish_language' => $validatedData['weight_polish_language'],
                    'weight_english_language' => $validatedData['weight_english_language'],
                    'weight_biology' => $validatedData['weight_biology'],
                    'weight_chemistry' => $validatedData['weight_chemistry'],
                    'weight_physics' => $validatedData['weight_physics'],
                    'weight_geography' => $validatedData['weight_geography'],
                    'weight_history' => $validatedData['weight_history'],
                    'image' => $photoPath,
                ]);

                DB::commit();
                return redirect()->route('admin.profiles')->with('success', 'Pomyślnie utworzono profil.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Wystąpił błąd podczas tworzenia profilu. Spróbuj ponownie później.');
            }
        }

        return redirect()->route('home.index')->with('error', 'Nie masz dostępu do tej strony.');
    }

    public function profileEdit($id)
    {
        if (!ctype_digit($id)) {
            abort(404);
        }

        if (Auth::user()->role_id == 1) {
            $profile = Profile::find($id);

            if (!$profile) {
                return redirect()->route('admin.profiles')->with('error', 'Profil nie został znaleziony.');
            }

            $subjects = Subject::get();
            $subject1 = Subject::find($profile->subject_extended1_id);
            $subject2 = Subject::find($profile->subject_extended2_id);
            $subject3 = Subject::find($profile->subject_extended3_id);

            return view('admin.edit-profile', compact('subjects', 'profile', 'subject1', 'subject2', 'subject3'));
        }

        return redirect()->route('home.index')->with('error', 'Nie masz dostępu do tej strony.');
    }

    public function profileEditAuthenticate(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $validatedData = $this->validateProfileData($request, false);

            $subject1 = Subject::where('name', $validatedData['subject_extended1'])->first();
            $subject2 = Subject::where('name', $validatedData['subject_extended2'])->first();
            $subject3 = Subject::where('name', $validatedData['subject_extended3'])->first();

            if (!$subject1 || !$subject2 || !$subject3) {
                return redirect()->back()->with('error', 'Nie znaleziono jednego lub więcej przedmiotów. Sprawdź poprawność danych.');
            }
            DB::beginTransaction();
            try {
                $profileId = $request->input('profile_id');
                $profile = Profile::find($profileId);
                $photoPath = $profile->image;

                if ($request->hasFile('photo')) {
                    if ($photoPath && Storage::disk('public')->exists('img/profiles/' . $photoPath)) {
                        Storage::disk('public')->delete('img/profiles/' . $photoPath);
                    }

                    $photoPath = $request->file('photo')->store('img/profiles', 'public');
                    $photoPath = basename($photoPath);
                }

                $profile->update([
                    'name' => $validatedData['name'],
                    'subject_extended1_id' => $subject1->id,
                    'hours_subject_extended1' => $validatedData['hours_subject_extended1'],
                    'subject_extended2_id' => $subject2->id,
                    'hours_subject_extended2' => $validatedData['hours_subject_extended2'],
                    'subject_extended3_id' => $subject3->id,
                    'hours_subject_extended3' => $validatedData['hours_subject_extended3'],
                    'number_of_seats' => $validatedData['number_of_seats'],
                    'entry_fee' => $validatedData['entry_fee'],
                    'weight_math' => $validatedData['weight_math'],
                    'weight_polish_language' => $validatedData['weight_polish_language'],
                    'weight_english_language' => $validatedData['weight_english_language'],
                    'weight_biology' => $validatedData['weight_biology'],
                    'weight_chemistry' => $validatedData['weight_chemistry'],
                    'weight_physics' => $validatedData['weight_physics'],
                    'weight_geography' => $validatedData['weight_geography'],
                    'weight_history' => $validatedData['weight_history'],
                    'image' => $photoPath,
                ]);

                DB::commit();
                return redirect()->route('admin.profiles')->with('success', 'Pomyślnie edytowane profil.');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Wystąpił błąd podczas edycji profilu. Spróbuj ponownie później.');
            }
        }

        return redirect()->route('home.index')->with('error', 'Nie masz dostępu do tej strony.');
    }

    public function deleteProfile(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $profileId = $request->input('profile_id');
            $profile = Profile::find($profileId);

            if ($profile) {
                $relatedRegistrations = DB::table('registrations')->where('profile_id', $profileId)->count();

                if ($relatedRegistrations === 0) {
                    $imagePath = $profile->image;

                    if ($imagePath && Storage::disk('public')->exists('img/profiles/' . $imagePath)) {
                        Storage::disk('public')->delete('img/profiles/' . $imagePath);
                    }

                    $profile->delete();

                    return redirect()->route('admin.profiles')->with('success', 'Profil został pomyślnie usunięty.');
                }

                return redirect()->back()->with('error', 'Profil nie może być usunięty, ponieważ istnieją do niego powiązane rekordy.');
            }

            return redirect()->back()->with('error', 'Nie możesz usunąć nieistniejącego profilu.');
        }

        return redirect()->back()->with('error', 'Nie masz wystarczających uprawnień aby wykonać tą operację.');
    }

    public function endRecruitment(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $profileId = $request->input('profile_id');
            $profile = Profile::find($profileId);

            if ($profile) {
                if ($profile->open_recruitment) {
                    $profile->open_recruitment = false;
                    $profile->save();

                    return redirect()->back()->with('success', 'Rekrutacja na profil ' . mb_strtolower($profile->name, 'UTF-8') . ' została zakończona.');
                }

                return redirect()->back()->with('error', 'Rekrutacja na ten profil została już zakończona.');
            }

            return redirect()->back()->with('error', 'Nie możesz zakończyć rekrutacji na nieistniejącym profilu.');
        }

        return redirect()->back()->with('error', 'Nie masz wystarczających uprawnień aby wykonać tą operację.');
    }

    public function redirectToHome()
    {
        return redirect()->route('home.index')->with('error', 'Nie możesz w ten sposób wykonać tej operacji.');
    }

    protected function createCandidateForUser($userId, $gender)
    {
        DB::beginTransaction();

        $photo = 'man_photo.png';
        if ($gender === 'Kobieta') {
            $photo = 'woman_photo.png';
        }

        $candidate = Candidate::create([
            'user_id' => $userId,
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

    public function editCandidate(Request $request)
    {
        $candidate_id = $request->session()->pull('candidate_id', $request->input('candidate_id'));
        $user_id = $request->session()->pull('user_id', $request->input('user_id'));
        $gender = $request->session()->pull('gender', $request->input('gender'));

        if (is_null($candidate_id) && is_null($user_id) && is_null($gender)) {
            return redirect()->route('home.index')->with('error', 'Nie możesz w ten sposób wykonać tej operacji.');
        }

        $candidate = Candidate::where('id', $candidate_id)->with(['user.data'])->first();

        if (!$candidate) {
            $candidate = $this->createCandidateForUser($user_id, $gender);
        }

        $dateOfBirth = $candidate->user->data->date_of_birth ? Carbon::parse($candidate->user->data->date_of_birth)->format('Y-m-d') : '';

        if (($candidate->photo && !Storage::disk('public')->exists('img/candidate/' . $candidate->photo)) || $candidate->photo === 'man_photo.png' || $candidate->photo === 'woman_photo.png') {
            $candidate->photo = 'man_photo.png';
            if ($candidate->user->data->gender === "Kobieta") {
                $candidate->photo = 'woman_photo.png';
            }
        }

        return view('admin.edit-candidate', compact('candidate', 'dateOfBirth', 'candidate_id', 'user_id', 'gender'));
    }

    public function editCandidateAuthenticate(Request $request)
    {
        $candidate_id = $request->session()->pull('candidate_id', $request->input('candidate_id'));
        $user_id = $request->session()->pull('user_id', $request->input('user_id'));
        $gender = $request->session()->pull('gender', $request->input('gender'));

        $candidate = Candidate::where('id', $candidate_id)->with(['user.data'])->first();

        if (!$candidate) {
            $candidate = $this->createCandidateForUser($user_id, $gender);
        }

        session([
            'candidate_id' => $request->input('candidate_id'),
            'user_id' => $request->input('user_id'),
            'gender' => $request->input('gender'),
        ]);
        $validatedData = CandidateController::validateSettingsData($request);

        DB::beginTransaction();
        try {

            CandidateController::updateUserData($candidate->user->data, $validatedData);
            CandidateController::updateCandidateData($candidate, $validatedData);

            $registration = Registration::where('candidate_id', $candidate->id)->first();

            if ($registration) {
                $profile = Profile::where('id', $registration->profile_id)->firstOrFail();
                $point_score = CandidateController::calculateCandidatePointScore($candidate, $profile);

                $registration->update([
                    'point_score' => $point_score
                ]);
            }

            $validatedNewPhoto = CandidateController::manageCandidatePhoto($candidate, $request);
            if (!$validatedNewPhoto) {
                DB::commit();
                return redirect()->back()->with('error', 'Nie możesz przesłać nowego zdjęcia, jeśli nie chcesz usunąć starego zdjęcia.');
            }

            $request->session()->forget(['candidate_id', 'user_id', 'gender']);
            DB::commit();
            return redirect()->route('employee.users')->with('success', 'Pomyślnie edytowano dane kandydata.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Wystąpił błąd edytowania danych. Spróbuj ponownie później.');
        }
    }
}

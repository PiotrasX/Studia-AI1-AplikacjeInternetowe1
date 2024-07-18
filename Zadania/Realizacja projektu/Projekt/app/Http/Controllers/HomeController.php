<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    public function index()
    {
        $profiles = Profile::with(['subjectExtended1', 'subjectExtended2', 'subjectExtended3'])->inRandomOrder()->take(6)->get();

        return view('home.index', compact('profiles'));
    }

    public function about()
    {
        return view('home.about');
    }

    public static function getUserRegistrations()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $candidate = DB::table('candidates')->where('user_id', $userId)->first();

            if ($candidate) {
                return DB::table('registrations')
                    ->where('candidate_id', $candidate->id)
                    ->pluck('profile_id')
                    ->toArray(); // Na jaki(/jakie) profil zarejestrowany jest kandydat
            }
        }

        return [];
    }

    public static function getRegistrationsCount()
    {
        return DB::table('registrations')
            ->select('profile_id', DB::raw('count(*) as total'))
            ->groupBy('profile_id')
            ->pluck('total', 'profile_id')
            ->toArray(); // Ilość osób zarejestrowanych na danym profilu
    }

    public static function formatWeight($weight)
    {
        return rtrim(rtrim(number_format($weight, 2), '0'), '.');
    }

    public static function subjectsAndWeight($profile)
    {
        return [
            'Matematyka' => HomeController::formatWeight($profile->weight_math),
            'Język polski' => HomeController::formatWeight($profile->weight_polish_language),
            'Język angielski' => HomeController::formatWeight($profile->weight_english_language),
            'Biologia' => HomeController::formatWeight($profile->weight_biology),
            'Chemia' => HomeController::formatWeight($profile->weight_chemistry),
            'Fizyka' => HomeController::formatWeight($profile->weight_physics),
            'Geografia' => HomeController::formatWeight($profile->weight_geography),
            'Historia' => HomeController::formatWeight($profile->weight_history),
        ];
    }

    public function profiles()
    {
        $profiles = Profile::with(['subjectExtended1', 'subjectExtended2', 'subjectExtended3'])->get();

        $userRegistrations = $this->getUserRegistrations();
        $registrationsCount = $this->getRegistrationsCount();

        return view('home.profiles', compact('profiles', 'userRegistrations', 'registrationsCount'));
    }

    public function profileShow($id)
    {
        if (!ctype_digit($id)) {
            abort(404);
        }

        $profile = Profile::findOrFail($id);

        $userRegistrations = $this->getUserRegistrations();
        $registrationsCount = $this->getRegistrationsCount();
        $subjectsAndWeight = HomeController::subjectsAndWeight($profile);

        return view('home.profile-show', compact('profile', 'userRegistrations', 'registrationsCount', 'subjectsAndWeight'));
    }

    public function regulations()
    {
        return view('home.regulations');
    }
}

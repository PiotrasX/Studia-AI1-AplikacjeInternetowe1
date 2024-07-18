<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Employee;
use App\Models\Profile;
use App\Models\Registration;

class EmployeeController extends Controller
{
    public function users()
    {
        $employees = Employee::whereHas('user', function ($query) {
            $query->where('role_id', 2);
        })->with(['user' => function ($query) {
            $query->select('id', 'email', 'data_id')->with('data');
        }])->get();

        $candidates = Candidate::with(['user' => function ($query) {
            $query->select('id', 'email', 'data_id')->with('data');
        }])->get();

        if (Auth::user()->role_id == 1) {
            $admins = Employee::whereHas('user', function ($query) {
                $query->where('role_id', 1);
            })->with(['user' => function ($query) {
                $query->select('id', 'email', 'data_id')->with('data');
            }])->get();

            return view('employee.users', compact('admins', 'employees', 'candidates'));
        }

        return view('employee.users', compact('employees', 'candidates'));
    }

    public function registrations()
    {
        $profiles = Profile::with(['subjectExtended1', 'subjectExtended2', 'subjectExtended3'])->get();
        $registrationsCount = HomeController::getRegistrationsCount();
        $registrationsByProfileId = [];
        $averageScoresByProfileId = [];
        $maxScoresByProfileId = [];
        $minScoresByProfileId = [];

        foreach ($profiles as $profile) {
            $registrationsByProfileId[$profile->id] = CandidateController::getRegistrationsByProfileId($profile->id);

            $registrationsPoints = Registration::where('profile_id', $profile->id)
                ->join('candidates', 'registrations.candidate_id', '=', 'candidates.id')
                ->select(
                    'candidates.result_math',
                    'candidates.result_polish_language',
                    'candidates.result_english_language',
                    'candidates.name_fourth_subject',
                    'candidates.result_fourth_subject'
                )
                ->get();

            $averageScores = [
                'math' => $registrationsPoints->avg('result_math'),
                'polish' => $registrationsPoints->avg('result_polish_language'),
                'english' => $registrationsPoints->avg('result_english_language'),
                'biology' => $registrationsPoints->where('name_fourth_subject', 'Biologia')->avg('result_fourth_subject'),
                'chemistry' => $registrationsPoints->where('name_fourth_subject', 'Chemia')->avg('result_fourth_subject'),
                'physics' => $registrationsPoints->where('name_fourth_subject', 'Fizyka')->avg('result_fourth_subject'),
                'geography' => $registrationsPoints->where('name_fourth_subject', 'Geografia')->avg('result_fourth_subject'),
                'history' => $registrationsPoints->where('name_fourth_subject', 'Historia')->avg('result_fourth_subject')
            ];

            $maxScores = [
                'math' => $registrationsPoints->max('result_math'),
                'polish' => $registrationsPoints->max('result_polish_language'),
                'english' => $registrationsPoints->max('result_english_language'),
                'biology' => $registrationsPoints->where('name_fourth_subject', 'Biologia')->max('result_fourth_subject'),
                'chemistry' => $registrationsPoints->where('name_fourth_subject', 'Chemia')->max('result_fourth_subject'),
                'physics' => $registrationsPoints->where('name_fourth_subject', 'Fizyka')->max('result_fourth_subject'),
                'geography' => $registrationsPoints->where('name_fourth_subject', 'Geografia')->max('result_fourth_subject'),
                'history' => $registrationsPoints->where('name_fourth_subject', 'Historia')->max('result_fourth_subject')
            ];

            $minScores = [
                'math' => $registrationsPoints->min('result_math'),
                'polish' => $registrationsPoints->min('result_polish_language'),
                'english' => $registrationsPoints->min('result_english_language'),
                'biology' => $registrationsPoints->where('name_fourth_subject', 'Biologia')->min('result_fourth_subject'),
                'chemistry' => $registrationsPoints->where('name_fourth_subject', 'Chemia')->min('result_fourth_subject'),
                'physics' => $registrationsPoints->where('name_fourth_subject', 'Fizyka')->min('result_fourth_subject'),
                'geography' => $registrationsPoints->where('name_fourth_subject', 'Geografia')->min('result_fourth_subject'),
                'history' => $registrationsPoints->where('name_fourth_subject', 'Historia')->min('result_fourth_subject')
            ];

            $averageScoresByProfileId[$profile->id] = $averageScores;
            $maxScoresByProfileId[$profile->id] = $maxScores;
            $minScoresByProfileId[$profile->id] = $minScores;
        }

        return view('employee.registrations', compact('profiles', 'registrationsCount', 'registrationsByProfileId', 'averageScoresByProfileId', 'maxScoresByProfileId', 'minScoresByProfileId'));
    }
}

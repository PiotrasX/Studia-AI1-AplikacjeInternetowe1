<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAdminOrEmployee;
use App\Http\Middleware\IsCandidate;

Route::get('/', function () {
    return redirect()->route('home.index');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/index', 'index')->name('home.index');
    Route::get('/about', 'about')->name('home.about');
    Route::get('/profiles', 'profiles')->name('home.profiles');
    Route::get('/profile/{id}', 'profileShow')->name('home.profileShow');
    Route::get('/regulations', 'regulations')->name('home.regulations');
});

Route::middleware([IsAdminOrEmployee::class])->prefix('employee')->controller(EmployeeController::class)->group(function () {
    Route::get('/users', 'users')->name('employee.users');
    Route::get('/registrations', 'registrations')->name('employee.registrations');
});

Route::middleware([IsAdmin::class])->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/profiles', 'profiles')->name('admin.profiles');
    Route::get('/profile/edit/{id}', 'profileEdit')->name('admin.profile.edit');
    Route::post('/profile/edit', 'profileEditAuthenticate')->name('admin.profile.editAuthenticate');
    Route::get('/profile/create', 'profileCreate')->name('admin.profile.create');
    Route::post('/profile/create', 'profileCreateAuthenticate')->name('admin.profile.createAuthenticate');
    Route::get('/profile/delete', 'redirectToHome');
    Route::delete('/profile/delete', 'deleteProfile')->name('admin.deleteProfile');
    Route::get('/registrations/end-recruitment', 'redirectToHome');
    Route::post('/registrations/end-recruitment', 'endRecruitment')->name('admin.endRecruitment');
    Route::get('/edit-candidate', 'editCandidate')->name('admin.editCandidateError');
    Route::post('/edit-candidate', 'editCandidate')->name('admin.editCandidate');
    Route::get('/edit-candidate-authenticate', 'redirectToHome');
    Route::post('/edit-candidate-authenticate', 'editCandidateAuthenticate')->name('admin.editCandidateAuthenticate');
});

Route::middleware([IsCandidate::class])->prefix('candidate')->controller(CandidateController::class)->group(function () {
    Route::get('/complete-the-exam-details', 'completeTheExamDetails')->name('candidate.completeTheExamDetails');
    Route::post('/complete-the-exam-details', 'completeTheExamDetailsAuthenticate')->name('candidate.completeTheExamDetailsAuthenticate');
    Route::get('/profile', 'profile')->name('candidate.profile');
    Route::get('/profile/pay-the-entry-fee', 'redirectToHome');
    Route::post('/profile/pay-the-entry-fee', 'payTheEntryFee')->name('candidate.payTheEntryFee');
    Route::get('/profile/top-up', 'redirectToHome');
    Route::post('/profile/top-up', 'topUp')->name('candidate.topUp');
    Route::get('/profile-register/{id}', 'profileRegister')->name('candidate.profileRegister');
    Route::get('/profile-register-send', 'redirectToPreviousProfileRegisterSend');
    Route::post('/profile-register-send', 'profileRegisterSend')->name('candidate.profileRegisterSend');
    Route::get('/settings', 'settings')->name('candidate.settings');
    Route::post('/settings', 'settingsAuthenticate')->name('candidate.settingsAuthenticate');
});

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login', 'loginAuthenticate')->name('auth.login.loginAuthenticate');
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register', 'registerAuthenticate')->name('auth.register.registerAuthenticate');
    Route::get('/logout', 'redirectToPreviousLogout');
    Route::post('/logout', 'logout')->name('auth.logout');
});

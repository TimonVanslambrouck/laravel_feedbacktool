<?php

use App\Http\Controllers\AddPatientsController;
use App\Http\Controllers\AddUsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackSessionController;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/{patient_id}', [DashboardController::class, 'showPatient'])->middleware(['auth'])->name('dashboardPatient');

Route::get('/add-users', function () {
    return view('add-users');
})->middleware(['auth'])->name('add-users');

Route::post('/add-users', [AddUsersController::class, 'store'])->middleware(['auth'])->name('add-users');

Route::get('/add-patients', function () {
    return view('add-patients');
})->middleware(['auth'])->name('add-patients');

Route::post('/add-patients', [AddPatientsController::class, 'store'])->middleware(['auth'])->name('add-patients');

Route::get('/feedback-session', [FeedbackSessionController::class, 'show'])->middleware(['auth'])->name('feedback-session');

Route::post('/feedback-session', [FeedbackSessionController::class, 'store'])->middleware(['auth'])->name('feedback-session');

require __DIR__.'/auth.php';


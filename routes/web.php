<?php

use Illuminate\Support\Facades\Auth;
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
    // $this->middleware('auth');
    return view('auth.login');
});

// Route::get('/', [App\Http\Controllers\Auth::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('student')->group(function () {
    // Route::get('/', [App\Http\Controllers\TeamITController::class, 'index'])->name('team_it');
    Route::get('delete/{id}', [\App\Http\Controllers\StudentController::class, 'destroy'])->name('student.delete');
    // Route::get('create', [\App\Http\Controllers\TeamITController::class, 'create'])->name('team_it.create');
    // Route::post('store', [\App\Http\Controllers\TeamITController::class, 'store'])->name('team_it.store');
    // Route::get('edit/{id}', [\App\Http\Controllers\TeamITController::class, 'edit'])->name('team_it.edit');
    Route::get('detail/{id}', [\App\Http\Controllers\StudentController::class, 'show'])->name('student.detail');
    Route::post('update', [\App\Http\Controllers\StudentController::class, 'update'])->name('student.update');

});

Route::prefix('profile')->group(function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    // Route::get('delete/{id}', [\App\Http\Controllers\TeamITController::class, 'delete'])->name('team_it.delete');
    // Route::get('create', [\App\Http\Controllers\TeamITController::class, 'create'])->name('team_it.create');
    // Route::post('store', [\App\Http\Controllers\TeamITController::class, 'store'])->name('team_it.store');
    // Route::get('edit/{id}', [\App\Http\Controllers\TeamITController::class, 'edit'])->name('team_it.edit');
    Route::post('update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});
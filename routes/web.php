<?php

use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\ScoreController;
use App\Http\Controllers\Mahasiswa\StudentController;
use App\Http\Controllers\Mahasiswa\SubjectController;
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

Route::get('/', [DashboardController::class, 'index'])->name('data.dashboard');

Route::group(['prefix' => 'data'], function () {
    Route::group(['prefix' => 'student'], function () {
      Route::get('/', [StudentController::class, 'index'])->name('data.student');
      Route::post('/', [StudentController::class, 'store'])->name('data.create');
      Route::post('/update', [StudentController::class, 'updateData'])->name('data.update');
      Route::post('/destroy/{id}', [StudentController::class, 'destroy']);
      Route::get('/{id}/edit', [StudentController::class, 'edit']);
    });

    Route::group(['prefix' => 'subject'], function () {
      Route::get('/', [SubjectController::class, 'index'])->name('data.subject');
      Route::post('/', [SubjectController::class, 'store'])->name('subject.create');
      Route::post('/update', [SubjectController::class, 'updateData'])->name('subject.update');
      Route::post('/destroy/{id}', [SubjectController::class, 'destroy']);
      Route::get('/{id}/edit', [SubjectController::class, 'edit']);
    });

    Route::group(['prefix' => 'score'], function () {
      Route::get('/', [ScoreController::class, 'index'])->name('data.score');
      Route::post('/', [ScoreController::class, 'store']);
      Route::post('/destroy/{id}', [ScoreController::class, 'destroy']);
      Route::get('/{id}/edit', [ScoreController::class, 'edit']);
    });
});

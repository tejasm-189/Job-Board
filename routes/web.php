<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;

Route::get('/', [App\Http\Controllers\JobController::class, 'index']);

Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'create'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'store']);
Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'destroy']);

Route::get('/employer', [App\Http\Controllers\EmployerController::class, 'create'])->middleware('auth');
Route::post('/employer', [App\Http\Controllers\EmployerController::class, 'store'])->middleware('auth');

Route::middleware('auth', 'employer')->group(function () {
    Route::get('/my-jobs', [App\Http\Controllers\MyJobController::class, 'index']);
    Route::get('/jobs/create', [App\Http\Controllers\MyJobController::class, 'create']);
    Route::post('/my-jobs', [App\Http\Controllers\MyJobController::class, 'store']);
    Route::get('/my-jobs/{job}/edit', [App\Http\Controllers\MyJobController::class, 'edit']);
    Route::patch('/my-jobs/{job}', [App\Http\Controllers\MyJobController::class, 'update']);
});

Route::get('/jobs/{job}/application', [App\Http\Controllers\JobApplicationController::class, 'create'])->middleware('auth');
Route::post('/jobs/{job}/application', [App\Http\Controllers\JobApplicationController::class, 'store'])->middleware('auth');

Route::get('/my-job-applications', [App\Http\Controllers\MyJobApplicationController::class, 'index'])->name('my-job-applications.index')->middleware('auth');
Route::delete('/my-job-applications/{myJobApplication}', [App\Http\Controllers\MyJobApplicationController::class, 'destroy'])->name('my-job-applications.destroy')->middleware('auth');

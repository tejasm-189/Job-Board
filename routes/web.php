<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;

Route::get('/', [App\Http\Controllers\JobController::class, 'index']);

Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'create'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'store']);
Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'destroy']);

Route::get('/jobs/{job}/application', [App\Http\Controllers\JobApplicationController::class, 'create'])->middleware('auth');
Route::post('/jobs/{job}/application', [App\Http\Controllers\JobApplicationController::class, 'store'])->middleware('auth');

Route::get('/my-job-applications', [App\Http\Controllers\MyJobApplicationController::class, 'index'])->name('my-job-applications.index')->middleware('auth');

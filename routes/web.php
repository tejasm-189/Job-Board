<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;

Route::get('/', [App\Http\Controllers\JobController::class, 'index']);

Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'create']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'store']);
Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'destroy']);

Route::get('/jobs/{job}/application', [App\Http\Controllers\JobApplicationController::class, 'create']);
Route::post('/jobs/{job}/application', [App\Http\Controllers\JobApplicationController::class, 'store']);

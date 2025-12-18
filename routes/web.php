<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;

Route::get('/', [App\Http\Controllers\JobController::class, 'index']);

Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show']);

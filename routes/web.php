<?php

use Illuminate\Support\Facades\Route;

use App\Models\Job;

Route::get('/', function () {
    $jobs = Job::all();

    return view('welcome', [
        'jobs' => $jobs,
        'featuredJobs' => $jobs->take(3),
        'tags' => Job::$categories,
    ]);
});

Route::get('/jobs/{job}', [App\Http\Controllers\JobController::class, 'show']);

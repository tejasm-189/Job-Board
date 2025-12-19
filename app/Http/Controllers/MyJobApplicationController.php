<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view('my_job_application.index', [
            'applications' => auth()->user()->applications()
                ->with(['job' => fn($query) => $query->withCount('applications')->withAvg('applications', 'expected_salary'), 'job.employer'])
                ->latest()->get()
        ]);
    }
}

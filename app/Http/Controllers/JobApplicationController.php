<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    public function create(Job $job)
    {
        Gate::authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    public function store(Job $job, Request $request)
    {
        Gate::authorize('apply', $job);

        $validatedAttributes = $request->validate([
            'expected_salary' => ['required', 'min:1', 'numeric'],
        ]);

        $job->applications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedAttributes['expected_salary'],
        ]);

        return redirect('/jobs/' . $job->id);
    }
}

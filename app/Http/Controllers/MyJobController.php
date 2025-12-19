<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class MyJobController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        return view('my_job.index', [
            'jobs' => $user->employer->jobs()
                ->with(['employer', 'applications'])
                ->latest()
                ->get()
        ]);
    }

    public function create()
    {
        return view('my_job.create');
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'description' => ['required'],
            'category' => ['required', 'in:' . implode(',', Job::$categories)],
            'experience' => ['required', 'in:' . implode(',', Job::$experience)],
        ]);

        $request->user()->employer->jobs()->create($validatedAttributes);

        return redirect('/')->with('success', 'Job posted successfully!');
    }
    public function edit(Job $job)
    {
        // Simple authorization check (Policy comes later in task 144)
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if ($user->employer->id !== $job->employer_id) {
            abort(403);
        }

        return view('my_job.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if ($user->employer->id !== $job->employer_id) {
            abort(403);
        }

        $validatedAttributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'description' => ['required'],
            'category' => ['required', 'in:' . implode(',', Job::$categories)],
            'experience' => ['required', 'in:' . implode(',', Job::$experience)],
        ]);

        $job->update($validatedAttributes);

        return redirect('/my-jobs')->with('success', 'Job updated successfully!');
    }
}

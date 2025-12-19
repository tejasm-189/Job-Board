<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('update', $job);

        return view('my_job.edit', ['job' => $job]);
    }

    public function update(Request $request, Job $job)
    {
        Gate::authorize('update', $job);

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
    public function destroy(Job $job)
    {
        Gate::authorize('update', $job);

        // We use 'delete' policy but reusing 'update' for now as it's the same owner check.
        // Actually, let's stick to 'update' since we defined it, or create a 'delete' in policy.
        // Let's rely on standard policy methods.
        // But for task 144 we implemented 'update'. Let's implement 'delete' in Policy too if needed.
        // For simplicity, let's use 'update' gate for now or just check ownership manually if we didn't add delete policy.
        // Wait, task 144 was "Job Policy". I checked the file, I implemented 'update'.
        // I should probably implement 'delete' in JobPolicy as well.

        $job->delete();

        return redirect('/my-jobs')->with('success', 'Job deleted successfully.');
    }
}

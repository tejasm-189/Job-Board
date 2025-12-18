<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['tags']); // optimizing query if tags relationship existed, but here direct columns

        $jobs = Job::query();

        if (request('search')) {
            $jobs->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }

        if (request('category')) {
            $jobs->where('category', request('category'));
        }

        if (request('experience')) {
            $jobs->where('experience', request('experience'));
        }

        if (request('salary')) {
            $jobs->where('salary', '>=', (int) request('salary'));
        }

        $jobs = $jobs->get();

        return view('welcome', [
            'jobs' => $jobs,
            'featuredJobs' => $jobs->take(3), // In reality featured might be a flag, but using top results
            'tags' => Job::$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

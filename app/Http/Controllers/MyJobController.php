<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class MyJobController extends Controller
{
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
}

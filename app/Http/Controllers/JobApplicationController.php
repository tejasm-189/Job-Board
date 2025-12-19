<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobApplicationController extends Controller
{
    public function create(Job $job)
    {
        return view('job_application.create', ['job' => $job]);
    }

    public function store(Job $job, Request $request)
    {
        //
    }
}

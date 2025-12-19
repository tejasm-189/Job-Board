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
        //
    }
}

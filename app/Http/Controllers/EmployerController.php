<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3', 'unique:employers,name'],
        ]);

        $employer = Employer::create([
            'name' => $attributes['name'],
            'user_id' => $request->user()->id
        ]);

        return redirect('/jobs/create')->with('success', 'Your employer account has been created!');
    }
}

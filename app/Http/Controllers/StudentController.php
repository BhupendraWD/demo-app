<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
        ]);
    
        $student = new Student();
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->phone = $validatedData['phone'];
        $student->gender = $validatedData['gender'];
    
        $student->course_1 = $request->has('course_1');
        $student->course_2 = $request->has('course_2');
    
        $student->save();
    
        return redirect('/')->with('success', 'Student created successfully!');
    }
}

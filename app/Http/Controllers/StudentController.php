<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
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

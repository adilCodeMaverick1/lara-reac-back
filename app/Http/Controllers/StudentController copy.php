<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $student = Student::create($request->all());
      
        return response()->json($student, 201);
    }
    public function index()
    {
        $students = Student::with('class.teachers', 'class.courses')->get();
        return response()->json($students);
    }
    

    public function show($id)
    {
        $student = Student::with('class.teachers', 'class.courses')->findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json($student);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $course = Course::create([
            'name' => $request->name,
        ]);

        return response()->json($course, 201);
    }
    public function index()
    {
        // Fetch all courses
        $courses = Course::all();
        return response()->json($courses);
    }
 
   
}

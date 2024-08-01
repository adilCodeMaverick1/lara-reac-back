<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function store(Request $request)
    {
        // $teacher = Teacher::create($request->all());
        // if ($request->has('class_ids')) {
        //     $teacher->classes()->attach($request->class_ids);
        // }
        // return response()->json($teacher, 201);
        $teacher = Teacher::create($request->only('name', 'email'));
        $teacher->classes()->attach($request->input('class_ids'));
        return response()->json($teacher);
    }
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->only('name', 'email'));
        $teacher->classes()->sync($request->input('class_ids'));
        return response()->json($teacher);
    }
}

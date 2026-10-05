<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student_classes = StudentClass::all();
        return view(
            'admin.setup.student_class.index',
            compact('student_classes'),
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setup.student_class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        StudentClass::create($request->all());
        $notification = [
            'message' => 'Class created successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.class.index')->with($notification);
    }

    public function edit(StudentClass $studentClass)
    {
        return view('admin.setup.student_class.edit', compact('studentClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentClass $studentClass)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $studentClass->update($request->all());
        $notification = [
            'message' => 'Class updated successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.class.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClass $studentClass)
    {
        $studentClass->delete();
        $notification = [
            'message' => 'Class deleted successfully',
            'alert-type' => 'error',
        ];
        return redirect()->route('student.class.index')->with($notification);
    }
}

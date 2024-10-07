<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return response([
            'status' => 'success',
            'message' => 'Student data  Fetched successfully',
            'data' => $students
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $name = $request->input('name');
        $course = $request->input('course');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $newStudent = Student::create([
            'name' => $name,
            'course' => $course,
            'email' => $email,
            'phone' => $phone
        ]);

        return response([
            'status' => 'success',
            'message' => 'Student data Created Successfully',
            'data' => $newStudent
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        if (!$student) {
            return response([
                'status' => 'fail',
                'message' => 'Blog not found',
            ], 404);
        }

        return response([
            'status' => 'success',
            'message' => 'Student data Found',
            'data' => $student

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $student = Student::find($id);

        $student->update($data);

        return response([
            'status' => 'success',
            'message' => 'Blog Updted Successfully',
            'data' => $student
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        $student->delete();

        return response([
            'status' => 'success',
            'message' => 'Blog Deleted successfully',
        ], 200);
    }
}

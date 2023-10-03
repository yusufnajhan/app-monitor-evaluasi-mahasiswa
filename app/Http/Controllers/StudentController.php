<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.students');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'students.add-student'
        )->with('route', route('students.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $custom_messages = [
            'required' => ':attribute harus diisi!',
            'unique' => ':attribute dengan NIM :value sudah ada'
        ];

        $custom_attributes = [
            'student_number' => 'NIM',
            'name' => 'Nama',
            'batch' => 'Angkatan'
        ];

        $validated_data = $request->validate([
            'student_number' => 'required|unique:students',
            'name' => 'required',
            'batch' => 'required'
        ], $custom_attributes, $custom_messages);

        $validated_data['status'] = 'Aktif';
        Student::create($validated_data);

        return redirect()->route('students.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}

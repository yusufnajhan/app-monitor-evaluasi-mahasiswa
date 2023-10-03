<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view(
            'students.students'
        );
    }

    public function create()
    {
        return view(
            'students.create',
        )->with('route', route('students.store'));
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->all());

        session()->flash('success', 'Data mahasiswa berhasil ditambahkan');

        return redirect()->route('students.index');
    }
}

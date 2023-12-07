<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campus = Campus::all();

        $data = [
            'campus' => $campus,
            'user' => Student::find($id),
        ];

        return view('student.dashboard', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student_id = $request['id'];

        // dd($student_id);

        // 'student_id' => ['required', 'string', 'unique:students'],
        //     'campus_id' => ['required'],
        //     'email' => ['required', 'string', 'email', 'unique:students'],
        //     'password' => ['required', 'string', 'min:6', 'confirmed'],

        $this->validate($request, [
            'student_id' => 'required|unique:students,student_id,' . $student_id,
            'campus_id' => 'required',
        ]);

        $data = $request->all();

        Student::find($student_id)->update($data);

        return redirect()->back()->with('success', 'Berhasil mengubah data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student = Student::find($id);
        $student->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
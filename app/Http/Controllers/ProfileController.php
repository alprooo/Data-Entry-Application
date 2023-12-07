<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // dd('ini profile');

        return view('profile');

    }

    public function update(Request $request)
    {

        $student_id = Auth::user()->id;

        // dd($student_id);

        // 'student_id' => ['required', 'string', 'unique:students'],
        //     'campus_id' => ['required'],
        //     'email' => ['required', 'string', 'email', 'unique:students'],
        //     'password' => ['required', 'string', 'min:6', 'confirmed'],

        $this->validate($request, [
            'student_id' => 'required|unique:students,student_id,' . $student_id,
            'email' => 'required|unique:students,email,' . $student_id,
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        if (Auth::user()->password == $request['password']) {
            $data['password'] = $request['password_old'];
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        // dd($data['password']);

        Student::find($student_id)->update($data);

        return redirect()->back()->with('success', 'Berhasil mengubah data');

    }
}
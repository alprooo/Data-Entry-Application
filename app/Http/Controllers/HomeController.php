<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // dd(Auth::user());

        $campus = Campus::all();

        $data = [
            'campus' => $campus,
            'user' => Auth::user(),
        ];

        if (Auth::user()->role == 0) {

            return view('student.dashboard', $data);
        } else {

            $all_students = Student::get_all_student_campus();

            $data['students'] = $all_students;

            return view('admin.list-student', $data);
        }
    }
}
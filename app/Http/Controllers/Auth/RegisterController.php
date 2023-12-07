<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    // $student_id = $_POST['student_id'];
    // $fname = $_POST['fname'];
    // $lname = $_POST['lname'];
    // $passport = $_POST['passport'];
    // $ikad = $_POST['ikad'];
    // $dob = $_POST['dob'];
    // $phone = $_POST['phone'];
    // $add_in = $_POST['add_in'];
    // $campus = $_POST['campus'];
    // $add_my = $_POST['add_my'];
    // $curr = $_POST['curr'];
    // $statusku = $_POST['statusku'];
    // $email = $_POST['email'];
    // $pwd = md5($_POST['pwd']);

    protected function validator(array $data)
    {
        // dd($data);

        return Validator::make($data, [
            'student_id' => ['required', 'string', 'unique:students'],
            'campus_id' => ['required'],
            'email' => ['required', 'string', 'email', 'unique:students'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        return Student::create([
            'student_id' => $data['student_id'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'passport' => $data['passport'],
            'ikad' => $data['ikad'],
            'dob' => $data['dob'],
            'phone_num' => $data['phone_num'],
            'campus_id' => $data['campus_id'],
            'add_id' => $data['add_id'],
            'add_my' => $data['add_my'],
            'cur_living' => $data['cur_living'],
            'status' => $data['status'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
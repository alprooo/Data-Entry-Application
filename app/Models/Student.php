<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'students';

    protected $fillable = [
        'student_id',
        'fname',
        'lname',
        'passport',
        'ikad',
        'dob',
        'phone_num',
        'add_in',
        'campus_id',
        'add_id',
        'add_my',
        'cur_living',
        'status',
        'email',
        'password',
    ];

    public static function get_all_student_campus()
    {

        $students = DB::table('students')
            ->join('campus', 'students.campus_id', '=', 'campus.id')
            ->select('students.*', 'campus.*', 'students.id')
            ->get();

        return $students;
    }

}
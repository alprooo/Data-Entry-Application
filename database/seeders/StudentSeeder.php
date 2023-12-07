<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert(
            [
                [
                    'student_id' => 'admin',
                    'campus_id' => null,
                    'fname' => 'Admin',
                    'password' => Hash::make('test'),
                    'role' => 1,

                ],
                [
                    'student_id' => 'abi1234',
                    'campus_id' => 1,
                    'fname' => 'STD1',
                    'password' => Hash::make('asdasd'),
                    'role' => 0,

                ],
                [
                    'student_id' => '1213123',
                    'campus_id' => 1,
                    'fname' => 'STD2',
                    'password' => Hash::make('asdasd'),
                    'role' => 0,

                ],

            ]
        );
    }
}

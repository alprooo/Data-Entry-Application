<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campus')->insert([
            [
                'ppi_name' => 'PPI AIU',
                'campus' => 'Albukhary International University',

            ],
            [
                'ppi_name' => 'PPI UTM',
                'campus' => 'Universitas Teknologi Malaysia',
            ],

        ]
        );
    }
}
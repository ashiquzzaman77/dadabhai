<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([

            ['name' => 'Ashik',
                'email' => 'ashik@gmail.com',
                'address' => 'Dhaka',
                'message' => 'Hello',
                'phone' => '0124546'],

        ]);
    }
}

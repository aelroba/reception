<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'مدير عام النظام',
            'email' => 'admin@hrc.gov.sa',
            'password' => Hash::make('Aa@1234'),


            'otp_code' => null,
            'status' => 1,
            'employee_id' => '940910',
            'job_title' => 'Super Admin',
            'specialization' => 'Manager',
            'qualification' => "Master's degree in Computer Science",
            'job_grade' => '30',
            'direct_manager' => null,
            'level_one' => 'none',
            'level_two' => 'none',
            'level_three' => 'none',
        ]);
    }
}

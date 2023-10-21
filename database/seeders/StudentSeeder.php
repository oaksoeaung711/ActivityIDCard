<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'program_id' => 1,
            'batch_id' => 1,
            'member_id' => 'KBTC-000001',
            'name' => 'Kaung Kaung',
            'email' => 'kaungkaung@kbtc.edu.mm',
            'phone' => '09777557034',
            'campus' => 'U Kun Zaw',
            'guardianname' => 'U Aung Aung',
            'dob' => '5-Mar-2000',
            'emergencyphone1' => '09777557034',
            'emergencyphone2' => '09777557034',
            'schoolemergencyphone' => '09777049569',
            'dateofissue' => '23-Mar-2000'
        ]);
    }
}

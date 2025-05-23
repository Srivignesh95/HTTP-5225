<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Course;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Student::factory()->create([
            'fname'=> 'Srivignesh Kavle',
            'lname' => 'Sathyanarayanan',
            'email' => 'ramnathkavle@gmail.com'

        ]);
        Student::factory(100)->create([]);
        Course::factory(5) -> create();
    }
}

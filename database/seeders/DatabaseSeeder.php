<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@education.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Sample Categories
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development', 'icon' => 'bi-code-slash'],
            ['name' => 'Data Science', 'slug' => 'data-science', 'icon' => 'bi-graph-up'],
            ['name' => 'Design', 'slug' => 'design', 'icon' => 'bi-palette'],
        ];

        foreach ($categories as $catData) {
            $category = \App\Models\Category::create($catData);
            
            // Create a course for each category
            $course = \App\Models\Course::create([
                'category_id' => $category->id,
                'instructor_id' => 1, // Admin
                'title' => 'Mastering ' . $catData['name'],
                'slug' => \Illuminate\Support\Str::slug('Mastering ' . $catData['name']),
                'description' => 'A comprehensive guide to ' . $catData['name'] . '. Learn from scratch and become an expert.',
                'price' => 49.99,
                'status' => 'published',
            ]);

            // Create some lessons for the course
            for ($i = 1; $i <= 5; $i++) {
                \App\Models\Lesson::create([
                    'course_id' => $course->id,
                    'title' => 'Lesson ' . $i . ': Intro to ' . $catData['name'],
                    'slug' => 'lesson-' . $i,
                    'content' => 'In this lesson, we will cover the basics of ' . $catData['name'] . '. Stay tuned for more!',
                    'order' => $i,
                ]);
            }
        }
    }
}

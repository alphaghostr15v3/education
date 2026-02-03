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

        // Map categories to thumbnails
        $thumbnails = [
            'web-development' => 'courses/web-dev.png',
            'data-science' => 'courses/data-science.png',
            'design' => 'courses/design.png',
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
                'thumbnail' => $thumbnails[$catData['slug']] ?? null,
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

        // Create Sample Events
        \App\Models\Event::create([
            'title' => 'Future of Education Seminar',
            'slug' => 'future-of-education-seminar',
            'description' => 'Join us for an inspiring seminar on the future of learning and technology.',
            'event_date' => now()->addDays(10),
            'location' => 'Grand Hall, Campus A',
            'image_path' => 'events/seminar.png',
        ]);

        // Create Sample Gallery
        $gallery = \App\Models\Gallery::create([
            'title' => 'Campus Life',
            'image_path' => 'gallery/campus.png',
            'category' => 'Campus',
        ]);

        \App\Models\GalleryImage::create([
            'gallery_id' => $gallery->id,
            'image_path' => 'gallery/campus.png',
        ]);
    }
}

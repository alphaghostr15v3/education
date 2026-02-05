<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CaseStudy;
use App\Models\AlumniSuccess;

class ImpactSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Case Studies
        CaseStudy::create([
            'title' => 'Digital Literacy for Rural Youth',
            'slug' => 'digital-literacy-rural-youth',
            'excerpt' => 'Connecting remote villages with modern digital skills and career opportunities.',
            'description' => 'Our Digital Literacy program aimed to bridge the digital divide in rural parts of Uttar Pradesh. We established 10 modern computer labs and trained over 500 students in basic computing, web browsing, and digital communication.',
            'challenge' => 'Limited electricity and lack of internet infrastructure in deep rural areas.',
            'solution' => 'Deployed solar-powered labs and satellite-based internet connectivity to ensure uninterrupted learning.',
            'result' => '90% of graduates found employment in nearby urban hubs or started their own digital service kiosks.',
            'status' => 'published',
        ]);

        CaseStudy::create([
            'title' => 'Sustainable Agriculture Innovation',
            'slug' => 'sustainable-agriculture-innovation',
            'excerpt' => 'Empowering the next generation of farmers with eco-friendly and high-yield techniques.',
            'description' => 'This project focused on teaching modern sustainable farming methods to vocational students specializing in agriculture. We combined traditional wisdom with modern hydroponic and organic farming technology.',
            'challenge' => 'Declining soil health and over-reliance on chemical fertilizers among local communities.',
            'solution' => 'Created a demonstration farm using purely organic methods and automated irrigation systems.',
            'result' => 'Graduates have successfully converted over 200 acres of local farmland to organic practices.',
            'status' => 'published',
        ]);

        // Sample Alumni Success
        AlumniSuccess::create([
            'name' => 'Rahul Sharma',
            'company' => 'Tech Mahindra',
            'position' => 'Junior Web Developer',
            'testimonial' => 'The vocational training I received at YSVEF was life-changing. I went from having zero tech skills to being a developer at a top firm in just 12 months.',
            'status' => 'published',
        ]);

        AlumniSuccess::create([
            'name' => 'Priya Patel',
            'company' => 'Green India Solar',
            'position' => 'Solar Technician',
            'testimonial' => 'The hands-on experience in the solar labs gave me the confidence to handle complex installations. Today, I lead a team of five technicians.',
            'status' => 'published',
        ]);
    }
}

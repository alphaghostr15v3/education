<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Course::with('category', 'instructor')->where('status', 'published');
        
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $courses = $query->latest()->paginate(9);
        $categories = \App\Models\Category::all();

        return view('courses.index', compact('courses', 'categories'));
    }

    public function show($slug)
    {
        $course = \App\Models\Course::with(['category', 'instructor', 'lessons'])->where('slug', $slug)->firstOrFail();
        $isEnrolled = auth()->check() ? auth()->user()->enrollments()->where('course_id', $course->id)->exists() : false;

        return view('courses.show', compact('course', 'isEnrolled'));
    }
}

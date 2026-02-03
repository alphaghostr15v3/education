<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($courseSlug, $lessonSlug)
    {
        $course = \App\Models\Course::where('slug', $courseSlug)->firstOrFail();
        
        // Check if user is enrolled
        if (!auth()->user()->enrollments()->where('course_id', $course->id)->exists() && !auth()->user()->isAdmin()) {
            return redirect()->route('courses.show', $course->slug)->with('error', 'Please enroll in the course to view lessons.');
        }

        $lesson = $course->lessons()->where('slug', $lessonSlug)->firstOrFail();
        $lessons = $course->lessons;

        return view('lessons.show', compact('course', 'lesson', 'lessons'));
    }
}

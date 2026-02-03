<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $course = \App\Models\Course::findOrFail($courseId);
        
        // Prevent duplicate enrollment
        if (auth()->user()->enrollments()->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        auth()->user()->enrollments()->create([
            'course_id' => $course->id,
            'enrolled_at' => now(),
            'status' => 'active',
        ]);

        return redirect()->route('lessons.show', [$course->slug, $course->lessons->first()->slug ?? 'intro'])
                         ->with('success', 'You have successfully enrolled in ' . $course->title);
    }
}

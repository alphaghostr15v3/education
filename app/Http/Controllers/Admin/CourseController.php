<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function index()
    {
        $courses = \App\Models\Course::with(['category', 'instructor'])->latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        $validated['instructor_id'] = auth()->id();
        $validated['status'] = 'published';

        if ($request->hasFile('thumbnail')) {
            $uploadPath = public_path('uploads/courses');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $validated['thumbnail'] = 'uploads/courses/' . $filename;
        }

        \App\Models\Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }

    public function edit(\App\Models\Course $course)
    {
        $categories = \App\Models\Category::all();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, \App\Models\Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            $uploadPath = public_path('uploads/courses');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            // Delete old thumbnail if exists
            if ($course->thumbnail && File::exists(public_path($course->thumbnail))) {
                File::delete(public_path($course->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $validated['thumbnail'] = 'uploads/courses/' . $filename;
        }
        
        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(\App\Models\Course $course)
    {
        if ($course->thumbnail && File::exists(public_path($course->thumbnail))) {
            File::delete(public_path($course->thumbnail));
        }
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }
}

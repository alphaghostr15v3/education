<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('author')->latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'nullable|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $validated['author_id'] = auth()->id();
        
        // Set published_at if status is published
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $validated['featured_image'] = 'uploads/blogs/' . $filename;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'nullable|max:255',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Set published_at if status changed to published
        if ($validated['status'] === 'published' && $blog->status !== 'published') {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image && File::exists(public_path($blog->featured_image))) {
                File::delete(public_path($blog->featured_image));
            }
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/blogs'), $filename);
            $validated['featured_image'] = 'uploads/blogs/' . $filename;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        // Delete featured image if exists
        if ($blog->featured_image && File::exists(public_path($blog->featured_image))) {
            File::delete(public_path($blog->featured_image));
        }

        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlumniSuccessController extends Controller
{
    public function index()
    {
        $alumni = AlumniSuccess::latest()->paginate(10);
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/alumni'), $filename);
            $validated['image'] = 'uploads/alumni/' . $filename;
        }

        AlumniSuccess::create($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni success story created successfully.');
    }

    public function edit(AlumniSuccess $alumnus)
    {
        return view('admin.alumni.edit', compact('alumnus'));
    }

    public function update(Request $request, AlumniSuccess $alumnus)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            if ($alumnus->image && File::exists(public_path($alumnus->image))) {
                File::delete(public_path($alumnus->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/alumni'), $filename);
            $validated['image'] = 'uploads/alumni/' . $filename;
        }

        $alumnus->update($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni success story updated successfully.');
    }

    public function destroy(AlumniSuccess $alumnus)
    {
        if ($alumnus->image && File::exists(public_path($alumnus->image))) {
            File::delete(public_path($alumnus->image));
        }
        $alumnus->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni success story deleted successfully.');
    }
}

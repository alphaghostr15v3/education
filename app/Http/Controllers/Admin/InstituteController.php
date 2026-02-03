<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = \App\Models\Institute::latest()->paginate(10);
        return view('admin.institutes.index', compact('institutes'));
    }

    public function create()
    {
        return view('admin.institutes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|max:2048',
            'features' => 'nullable|string',
            'action_url' => 'nullable|url',
        ]);

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('institutes', 'public');
            $validated['thumbnail'] = $path;
        }

        \App\Models\Institute::create($validated);

        return redirect()->route('admin.institutes.index')->with('success', 'Institute created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $institute = \App\Models\Institute::findOrFail($id);
        return view('admin.institutes.edit', compact('institute'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
            'features' => 'nullable|string',
            'action_url' => 'nullable|url',
        ]);

        $institute = \App\Models\Institute::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            // Optional: Delete old image
            $path = $request->file('thumbnail')->store('institutes', 'public');
            $validated['thumbnail'] = $path;
        }

        $institute->update($validated);

        return redirect()->route('admin.institutes.index')->with('success', 'Institute updated successfully.');
    }

    public function destroy(string $id)
    {
        $institute = \App\Models\Institute::findOrFail($id);
        $institute->delete();
        return redirect()->route('admin.institutes.index')->with('success', 'Institute deleted successfully.');
    }
}

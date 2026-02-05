<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\File;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::orderBy('order')->get();
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $uploadPath = public_path('uploads/stories');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $path = 'uploads/stories/' . $filename;
        }

        Story::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.stories.index')->with('success', 'Story section created successfully.');
    }

    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            $uploadPath = public_path('uploads/stories');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            if ($story->image_path && File::exists(public_path($story->image_path))) {
                File::delete(public_path($story->image_path));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $data['image_path'] = 'uploads/stories/' . $filename;
        }

        $story->update($data);

        return redirect()->route('admin.stories.index')->with('success', 'Story section updated successfully.');
    }

    public function destroy(Story $story)
    {
        if ($story->image_path && File::exists(public_path($story->image_path))) {
            File::delete(public_path($story->image_path));
        }
        $story->delete();

        return redirect()->route('admin.stories.index')->with('success', 'Story section deleted successfully.');
    }
}

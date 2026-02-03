<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('order')->paginate(10);
        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['order']);
        $data['title'] = $request->title ?? 'Untitled Slide'; // Required by model but user only wants photos
        $data['description'] = $request->description;
        $data['label'] = $request->label;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/hero'), $imageName);
            $data['image_path'] = '/images/hero/' . $imageName;
        }

        HeroSlide::create($data);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide added successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero-slides.edit', compact('heroSlide'));
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['order']);
        $data['title'] = $request->title ?? $heroSlide->title;
        $data['description'] = $request->description ?? $heroSlide->description;
        $data['label'] = $request->label ?? $heroSlide->label;

        if ($request->hasFile('image')) {
            // Delete old image
            $oldPath = public_path($heroSlide->image_path);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/hero'), $imageName);
            $data['image_path'] = '/images/hero/' . $imageName;
        }

        $heroSlide->update($data);

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        // Delete image file
        $path = public_path($heroSlide->image_path);
        if (File::exists($path)) {
            File::delete($path);
        }

        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')->with('success', 'Hero slide deleted successfully.');
    }
}

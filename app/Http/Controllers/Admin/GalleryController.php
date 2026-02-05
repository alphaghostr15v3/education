<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GalleryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            'admin',
        ];
    }

    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'required|array|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['title', 'category']);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            
            // First image as primary
            $primaryImage = $files[0];
            $primaryName = time().'_0.'.$primaryImage->extension();
            $primaryImage->move(public_path('uploads/gallery'), $primaryName);
            $data['image_path'] = 'uploads/gallery/' . $primaryName;
            
            $gallery = Gallery::create($data);

            // Save all images to gallery_images table
            foreach ($files as $index => $file) {
                if ($index == 0) {
                    $imagePath = $data['image_path'];
                } else {
                    $imageName = time().'_'.$index.'.'.$file->extension();
                    $file->move(public_path('uploads/gallery'), $imageName);
                    $imagePath = 'uploads/gallery/' . $imageName;
                }
                
                \App\Models\GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item created with ' . count($request->file('images')) . ' images.');
    }

    public function edit(Gallery $gallery)
    {
        $gallery->load('images');
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['title', 'category']);

        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($gallery->images as $oldImage) {
                if (File::exists(public_path($oldImage->image_path))) {
                    File::delete(public_path($oldImage->image_path));
                }
                $oldImage->delete();
            }

            $files = $request->file('images');
            
            // First image as primary
            $primaryImage = $files[0];
            $primaryName = time().'_0.'.$primaryImage->extension();
            $primaryImage->move(public_path('uploads/gallery'), $primaryName);
            $data['image_path'] = 'uploads/gallery/' . $primaryName;
            
            $gallery->update($data);

            // Save new images
            foreach ($files as $index => $file) {
                if ($index == 0) {
                    $imagePath = $data['image_path'];
                } else {
                    $imageName = time().'_'.$index.'.'.$file->extension();
                    $file->move(public_path('uploads/gallery'), $imageName);
                    $imagePath = 'uploads/gallery/' . $imageName;
                }
                
                \App\Models\GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $imagePath,
                ]);
            }
        } else {
            $gallery->update($data);
        }

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete all images associated with this gallery
        foreach ($gallery->images as $image) {
            if (File::exists(public_path($image->image_path))) {
                File::delete(public_path($image->image_path));
            }
            $image->delete();
        }
        
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item deleted successfully.');
    }
}

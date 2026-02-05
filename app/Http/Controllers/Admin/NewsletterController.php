<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\File;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:10240', // Max 10MB
            'published_date' => 'required|date',
        ]);

        $path = '';
        if ($request->hasFile('file')) {
            $uploadPath = public_path('uploads/newsletters');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $path = 'uploads/newsletters/' . $filename;
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumb_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('uploads/newsletters/thumbnails'), $thumbnailName);
            $thumbnailPath = 'uploads/newsletters/thumbnails/' . $thumbnailName;
        }

        Newsletter::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailPath,
            'description' => $request->description,
            'file_path' => $path,
            'published_date' => $request->published_date,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter uploaded successfully.');
    }

    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:10240',
            'published_date' => 'required|date',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'published_date' => $request->published_date,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('file')) {
            $uploadPath = public_path('uploads/newsletters');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            // Delete old file
            if ($newsletter->file_path && File::exists(public_path($newsletter->file_path))) {
                File::delete(public_path($newsletter->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $data['file_path'] = 'uploads/newsletters/' . $filename;
        }

        if ($request->hasFile('thumbnail')) {
            $uploadPath = public_path('uploads/newsletters/thumbnails');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            // Delete old thumbnail
            if ($newsletter->thumbnail && File::exists(public_path($newsletter->thumbnail))) {
                File::delete(public_path($newsletter->thumbnail));
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumb_' . $thumbnail->getClientOriginalName();
            $thumbnail->move($uploadPath, $thumbnailName);
            $data['thumbnail'] = 'uploads/newsletters/thumbnails/' . $thumbnailName;
        }

        $newsletter->update($data);

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter updated successfully.');
    }

    public function destroy(Newsletter $newsletter)
    {
        if ($newsletter->file_path && File::exists(public_path($newsletter->file_path))) {
            File::delete(public_path($newsletter->file_path));
        }

        if ($newsletter->thumbnail && File::exists(public_path($newsletter->thumbnail))) {
            File::delete(public_path($newsletter->thumbnail));
        }

        $newsletter->delete();

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter deleted successfully.');
    }
}

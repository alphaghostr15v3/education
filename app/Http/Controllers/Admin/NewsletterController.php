<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Storage;

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
            'file' => 'required|mimes:pdf|max:10240', // Max 10MB
            'published_date' => 'required|date',
        ]);

        $path = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/newsletters'), $filename);
            $path = 'uploads/newsletters/' . $filename;
        }

        Newsletter::create([
            'title' => $request->title,
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
            'file' => 'nullable|mimes:pdf|max:10240',
            'published_date' => 'required|date',
        ]);

        $data = [
            'title' => $request->title,
            'published_date' => $request->published_date,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if ($newsletter->file_path && file_exists(public_path($newsletter->file_path))) {
                unlink(public_path($newsletter->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/newsletters'), $filename);
            $data['file_path'] = 'uploads/newsletters/' . $filename;
        }

        $newsletter->update($data);

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter updated successfully.');
    }

    public function destroy(Newsletter $newsletter)
    {
        if ($newsletter->file_path && file_exists(public_path($newsletter->file_path))) {
            unlink(public_path($newsletter->file_path));
        }
        $newsletter->delete();

        return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter deleted successfully.');
    }
}

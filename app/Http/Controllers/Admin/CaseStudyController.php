<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::latest()->paginate(10);
        return view('admin.case-studies.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('admin.case-studies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'result' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/case-studies'), $filename);
            $validated['image'] = 'uploads/case-studies/' . $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);

        CaseStudy::create($validated);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study created successfully.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        return view('admin.case-studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'result' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('image')) {
            if ($caseStudy->image && File::exists(public_path($caseStudy->image))) {
                File::delete(public_path($caseStudy->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/case-studies'), $filename);
            $validated['image'] = 'uploads/case-studies/' . $filename;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $caseStudy->update($validated);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study updated successfully.');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        if ($caseStudy->image && File::exists(public_path($caseStudy->image))) {
            File::delete(public_path($caseStudy->image));
        }
        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Case study deleted successfully.');
    }
}

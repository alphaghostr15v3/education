<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('order')->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'bio' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('photo')) {
            $uploadPath = public_path('uploads/team');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $validated['photo'] = 'uploads/team/' . $filename;
        }

        Team::create($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully!');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'bio' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('photo')) {
            $uploadPath = public_path('uploads/team');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            // Delete old photo if exists
            if ($team->photo && File::exists(public_path($team->photo))) {
                File::delete(public_path($team->photo));
            }
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $validated['photo'] = 'uploads/team/' . $filename;
        }

        $team->update($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully!');
    }

    public function destroy(Team $team)
    {
        // Delete photo if exists
        if ($team->photo && File::exists(public_path($team->photo))) {
            File::delete(public_path($team->photo));
        }

        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:url,upload',
            'video_url' => 'nullable|required_if:type,url|url',
            'video_file' => 'nullable|required_if:type,upload|file|mimes:mp4,mov,ogg,qt|max:51200', // 50MB
            'thumbnail' => 'nullable|url',
        ]);

        $data = $request->except(['video_file']);

        if ($request->type === 'upload' && $request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('videos', 'public');
            $data['video_url'] = 'storage/' . $path;
        }

        Video::create($data);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:url,upload',
            'video_url' => 'nullable|required_if:type,url|url',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
            'thumbnail' => 'nullable|url',
        ]);

        $video = Video::findOrFail($id);
        $data = $request->except(['video_file']);

        if ($request->type === 'upload' && $request->hasFile('video_file')) {
            $path = $request->file('video_file')->store('videos', 'public');
            $data['video_url'] = 'storage/' . $path;
        } elseif ($request->type === 'url') {
            // Ensure we keep the url if it was switched back or changed
            $data['video_url'] = $request->video_url;
        }

        $video->update($data);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video deleted successfully.');
    }
}

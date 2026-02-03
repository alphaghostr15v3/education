<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = Video::where('is_published', true)->latest()->paginate(9);
        return view('pages.videos', compact('videos'));
    }
}

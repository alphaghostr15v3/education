<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function gallery()
    {
        $galleries = Gallery::with('images')->latest()->get();
        return view('pages.gallery', compact('galleries'));
    }

    public function events()
    {
        $events = Event::where('event_date', '>=', now())
                      ->orderBy('event_date', 'asc')
                      ->get();
        return view('pages.events', compact('events'));
    }

    public function about() { return view('pages.about'); }
    public function blog() { return view('pages.blog'); }
    public function contact() { return view('pages.contact'); }
    public function faq() { return view('pages.faq'); }
    public function team() { return view('pages.team'); }
    public function pricing() { return view('pages.pricing'); }
}

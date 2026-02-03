<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Event;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('order')->get();
        return view('landing', compact('slides'));
    }

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
    public function mission() { return view('pages.mission'); }
    public function story() { return view('pages.story'); }
    public function leadership() { return view('pages.leadership'); }
    public function partners() { return view('pages.partners'); }
    public function institutes()
    {
        $institutes = \App\Models\Institute::latest()->get();
        return view('pages.institutes', compact('institutes'));
    }
    public function institutions() { return view('pages.institutions'); }
    public function curriculum() { return view('pages.curriculum'); }
    public function blog() { return view('pages.blog'); }
    public function contact() { return view('pages.contact'); }
    public function faq() { return view('pages.faq'); }
    public function team() { return view('pages.team'); }
    public function pricing() { return view('pages.pricing'); }
}

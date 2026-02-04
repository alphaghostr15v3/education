<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Event;
use App\Models\HeroSlide;
use App\Models\Blog;
use App\Models\Team;
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
    public function leadership()
    {
        $teams = Team::orderBy('order')->get();
        return view('pages.leadership', compact('teams'));
    }
    public function partners() { return view('pages.partners'); }
    public function institutes()
    {
        $institutes = \App\Models\Institute::latest()->get();
        return view('pages.institutes', compact('institutes'));
    }
    public function institutions() { return view('pages.institutions'); }
    public function curriculum() { return view('pages.curriculum'); }
    public function blog()
    {
        $blogs = Blog::published()->with('author')->latest('published_at')->paginate(9);
        return view('pages.blog', compact('blogs'));
    }
    
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();
        return view('pages.blog-detail', compact('blog'));
    }
    public function contact() { return view('pages.contact'); }
    public function faq() { return view('pages.faq'); }
    public function team()
    {
        $teams = Team::orderBy('order')->get();
        return view('pages.team', compact('teams'));
    }
    public function pricing() { return view('pages.pricing'); }

    public function newsletters()
    {
        $newsletters = \App\Models\Newsletter::where('is_active', true)
                                           ->orderBy('published_date', 'desc')
                                           ->get();
        return view('pages.newsletters', compact('newsletters'));
    }
}

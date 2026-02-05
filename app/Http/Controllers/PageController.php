<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Event;
use App\Models\HeroSlide;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Contact;
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
    public function story()
    {
        $stories = \App\Models\Story::orderBy('order')->get();
        return view('pages.story', compact('stories'));
    }
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

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Thank you for your message. We have received it and will get back to you soon!');
    }
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

    public function caseStudies()
    {
        $caseStudies = \App\Models\CaseStudy::published()->latest()->paginate(9);
        return view('pages.case-studies.index', compact('caseStudies'));
    }

    public function caseStudyDetail($slug)
    {
        $caseStudy = \App\Models\CaseStudy::where('slug', $slug)->published()->firstOrFail();
        return view('pages.case-studies.show', compact('caseStudy'));
    }

    public function alumniSuccess()
    {
        $alumni = \App\Models\AlumniSuccess::published()->latest()->get();
        return view('pages.alumni-success', compact('alumni'));
    }
}

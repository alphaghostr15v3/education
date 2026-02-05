<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EventController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            'admin',
        ];
    }

    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $uploadPath = public_path('storage/events');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move($uploadPath, $imageName);
            $data['image_path'] = '/storage/events/' . $imageName;
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $uploadPath = public_path('storage/events');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0775, true, true);
            }
            // Delete old image if exists
            if ($event->image_path && File::exists(public_path($event->image_path))) {
                File::delete(public_path($event->image_path));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move($uploadPath, $imageName);
            $data['image_path'] = '/storage/events/' . $imageName;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image_path && File::exists(public_path($event->image_path))) {
            File::delete(public_path($event->image_path));
        }
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'courses' => \App\Models\Course::count(),
            'enrollments' => \App\Models\Enrollment::count(),
            'categories' => \App\Models\Category::count(),
            'galleries' => \App\Models\Gallery::count(),
            'events' => \App\Models\Event::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

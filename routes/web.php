<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\VideoController;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('courses', CourseController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class)->only(['index', 'destroy']);
    Route::resource('galleries', GalleryController::class);
    Route::resource('events', EventController::class);
    Route::resource('hero-slides', HeroSlideController::class);
    Route::resource('videos', VideoController::class);
});

// Student/Public Routes
Route::get('/courses', [\App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [\App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');

// Public Pages
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/about/mission-vision', [App\Http\Controllers\PageController::class, 'mission'])->name('about.mission');
Route::get('/about/our-story', [App\Http\Controllers\PageController::class, 'story'])->name('about.story');
Route::get('/about/leadership-team', [App\Http\Controllers\PageController::class, 'leadership'])->name('about.leadership');
Route::get('/about/partners', [App\Http\Controllers\PageController::class, 'partners'])->name('about.partners');
Route::get('/institutes-programs', [App\Http\Controllers\PageController::class, 'institutes'])->name('institutes');
Route::get('/our-institutions', [App\Http\Controllers\PageController::class, 'institutions'])->name('institutions');
Route::get('/courses-curriculum', [App\Http\Controllers\PageController::class, 'curriculum'])->name('curriculum');
Route::get('/events', [App\Http\Controllers\PageController::class, 'events'])->name('events');
Route::get('/gallery', [App\Http\Controllers\PageController::class, 'gallery'])->name('gallery');
Route::get('/media/videos', [\App\Http\Controllers\VideoController::class, 'index'])->name('videos.index');
Route::get('/blog', [App\Http\Controllers\PageController::class, 'blog'])->name('blog');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');

// Sub Pages
Route::get('/faq', [App\Http\Controllers\PageController::class, 'faq'])->name('faq');
Route::get('/team', [App\Http\Controllers\PageController::class, 'team'])->name('team');
Route::get('/pricing', [App\Http\Controllers\PageController::class, 'pricing'])->name('pricing');

Route::middleware(['auth'])->group(function () {
    Route::post('/courses/{id}/enroll', [\App\Http\Controllers\EnrollmentController::class, 'store'])->name('courses.enroll');
    Route::get('/courses/{courseSlug}/lessons/{lessonSlug}', [\App\Http\Controllers\LessonController::class, 'show'])->name('lessons.show');
});

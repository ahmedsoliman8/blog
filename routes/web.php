<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ThemeController;
use \App\Http\Controllers\SubscriberController;

//Theme Routes
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/single-blog', 'singleBlog')->name('singleBlog');

});
//Category Routes
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{category:name}', [CategoryController::class, 'show'])
    ->name('categories.show');
// contact Routes
Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('contact.store');
//Subscriber Store Routes
Route::post('/subscriber-store', [SubscriberController::class, 'store'])->name('subscribe.store');
//Blog  Routes
Route::resource('blogs', BlogController::class)
    ->middleware('auth')
    ->except(['show']);
Route::get('/blogs/{blog}', [BlogController::class, 'show'])
    ->name('blogs.show');

Route::get('my-blogs', [BlogController::class, 'myBlogs'])
    ->name('blogs.my-blogs')
    ->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


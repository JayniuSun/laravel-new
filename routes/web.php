<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectTypesController;
use App\Http\Controllers\ProjectDetailsController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('projects', \App\Http\Controllers\ProjectController::class)
    ->middleware(['auth', 'verified']);

Route::resource('categories', \App\Http\Controllers\CategoryController::class)
    ->middleware(['auth', 'verified']);

Route::resource('project_types', \App\Http\Controllers\ProjectTypesController::class)
    ->middleware(['auth', 'verified']);

    Route::resource('project_details', \App\Http\Controllers\ProjectDetailsController::class)
    ->middleware(['auth', 'verified']);

Route::resource('products', \App\Http\Controllers\ProductController::class)
->middleware(['auth', 'verified']);

Route::resource('messages', \App\Http\Controllers\MessageController::class)
->middleware(['auth', 'verified']);

Route::get('/delete-message-all', [MessageController::class, 'deleteAll'])->name('messages.delete-all');
Route::get('/delete-product-all', [ProductController::class, 'deleteAll'])->name('products.delete-all');
Route::get('/delete-project-all', [ProjectController::class, 'deleteAll'])->name('projects.delete-all');
Route::get('/delete-category-all', [CategoryController::class, 'deleteAll'])->name('categories.delete-all');
Route::get('/delete-project-types-all', [CategoryController::class, 'deleteAll'])->name('project-types.delete-all');

// route jalankan seeder
Route::get('/run-seeder', function () {
    Artisan::call('db:seed');
    return redirect()->route('dashboard')->with('success', 'Database seeded successfully!');
})->middleware(['auth', 'verified'])->name('run.seeder');

Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    return redirect()->route('dashboard')->with('success', 'Optimize clear successfully!');
})->middleware(['auth', 'verified'])->name('optimize.clear');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

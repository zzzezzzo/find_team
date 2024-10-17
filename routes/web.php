<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// this route is response the admin
Route::middleware(['auth', 'is_admin:admin'])->group(function () {
    // Your admin routes here
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    // admin CURD App 
    Route::get('/course',[CourseController::class, 'index'])->name('courses.index');
    Route::post('/course',[CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/create',[CourseController::class, 'create'])->name('courses.create');
    Route::get('/courses/trash',[CourseController::class, 'index_trash'])->name('courses.index_trash');
    Route::get('/courses/{course}/restore', [CourseController::class,'restore'])->name('courses.restore');
    Route::delete('/courses/{course}/delete_forEver', [CourseController::class,'delete_forEver'])->name('courses.delete_forEver');
    Route::get('/courses/{course}',[CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}',[CourseController::class, 'show'])->name('courses.show');
    Route::delete('/courses/{course}',[CourseController::class, 'destroy'])->name('courses.destroy');
});


Route::middleware('auth')->group(function () {
    // this is the route of the user 
    Route::get('/user', [HomeController::class, 'index'])->name('user.dashboard');
    Route::post('/user', [HomeController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [HomeController::class, 'show'])->name('user.show');
    Route::put('/user/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}',[HomeController::class,'destroy'])->name('user.destroy');
    

    // this is the route of the profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

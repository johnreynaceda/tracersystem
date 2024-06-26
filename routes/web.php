<?php

use App\Http\Controllers\ProfileController;
use App\Models\AlumniInformation;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('alumni.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//Alumni routes

Route::prefix('alumni')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('alumni.index');
    })->name('alumni.dashboard');
    Route::get('/alumni-list', function () {
        return view('alumni.alumni-list');
    })->name('alumni.list');
    Route::get('/alumni-form', function () {
        return view('alumni.alumni-form');
    })->name('alumni.alumni-form');
    Route::get('/gallery', function () {
        return view('alumni.gallery');
    })->name('alumni.gallery');
    Route::get('/about', function () {
        return view('alumni.about');
    })->name('alumni.about');
    Route::get('/edit-record', function () {
      if (AlumniInformation::where('user_id', auth()->user()->id)->get()->count() > 0) {
     return view('alumni.edit-record');

      }else{
        sweetalert()->addError('Your Record may not have been uploaded.');
        return redirect()->back();
      }
    })->name('alumni.edit-record');

});

//Admin routes

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/gallery', function () {
        return view('admin.gallery');
    })->name('admin.gallery');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
    Route::get('/alumni', function () {
        return view('admin.alumni');
    })->name('admin.alumni');
    Route::get('/course-list', function () {
        return view('admin.course-list');
    })->name('admin.course-list');
    Route::get('/events', function () {
        return view('admin.events');
    })->name('admin.events');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

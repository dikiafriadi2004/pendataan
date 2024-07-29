<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware('can:manage villages')->group(function () {
            Route::resource('villages', VillageController::class);
        });

        Route::middleware('can:manage categories')->group(function () {
            Route::resource('categories', CategoryController::class);
        });

        Route::middleware('can:manage coordinators')->group(function () {
            Route::resource('coordinators', CoordinatorController::class);
        });

        Route::middleware('can:manage villages')->group(function () {
            Route::get('/add/member/{coordinator:slug}', [MemberController::class, 'create'])->name('member.create');
            Route::post('/add/member/{coordinator:slug}/store', [MemberController::class, 'store'])->name('member.store');
        });
    });
});

require __DIR__.'/auth.php';

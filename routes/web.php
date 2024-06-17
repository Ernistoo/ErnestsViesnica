<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
    Route::get('/yourrooms', [RoomController::class, 'index2'])->name('yourrooms');
    Route::get('/roomrequests', [RoomController::class, 'index3'])->name('roomrequests');
    Route::get('/reservations', [RoomController::class, 'index4'])->name('reservations');
    Route::get('/show/{id}', [RoomController::class, 'show'])->name('show');
    Route::delete('/show/{id}', [RoomController::class, 'delete'])->name('delete');

    Route::post('/rooms/{id}/reserve', [RoomController::class, 'reserve'])->name('reserve');


    Route::get('/review/{roomid}', [RoomController::class, 'review'])->name('review');
    Route::post('/review/{roomid}', [RoomController::class, 'reviewstore'])->name('reviewstore');

    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit');

    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [RoomController::class, 'update'])->name('update');


    Route::get('/showrequest/{id}', [RoomController::class, 'show2'])->name('showrequest');
    Route::post('/rooms/{id}/accept', [RoomController::class, 'accept'])->name('accept');

    Route::delete('/showrequest/{id}', [RoomController::class, 'delete2'])->name('deleterequest');

    Route::get('/create', [RoomController::class, 'create'])->name('create');
    Route::post('/create', [RoomController::class, 'store'])->name('create');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

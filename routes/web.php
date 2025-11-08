<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PhotoController;

Route::get('/', [PhotoController::class, 'index'])->name('gallery.index');
Route::get('/upload', [PhotoController::class, 'create'])->name('gallery.upload');
Route::post('/store', [PhotoController::class, 'store'])->name('gallery.store');
Route::get('/edit/{id}', [PhotoController::class, 'edit'])->name('gallery.edit');
Route::post('/update/{id}', [PhotoController::class, 'update'])->name('gallery.update');
Route::delete('/delete/{id}', [PhotoController::class, 'destroy'])->name('gallery.destroy');



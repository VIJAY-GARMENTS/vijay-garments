<?php

use Illuminate\Support\Facades\Route;

//blogpost
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/blogpost/{id}/upsert', App\Livewire\Blogpost\Upsert::class)->name('blogpost.upsert');
});

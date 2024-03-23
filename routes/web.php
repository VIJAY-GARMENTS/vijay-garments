<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Webs\Home\Index::class)->name('home');
Route::get('/service', App\Livewire\Webs\Home\Service::class)->name('service');
Route::get('/about', App\Livewire\Webs\Home\About::class)->name('about');
Route::get('/contact', App\Livewire\Webs\Home\Contact::class)->name('contact');
Route::get('/posts', App\Livewire\Blog\Post\Index::class)->name('posts');
Route::get('/posts/{id}/upsert', App\Livewire\Blog\Post\Upsert::class)->name('posts.upsert');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', App\Livewire\Dashboard\Index::class)->name('dashboard');

});


//utility
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/icons', App\Livewire\Utilities\Icon\Index::class)->name('icons');

});


//sys
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('sys', App\Livewire\Sys\Artisan\Migration::class)->name('sys');
});

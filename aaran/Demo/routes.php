<?php

use Illuminate\Support\Facades\Route;

//Demo
Route::get('/demo-requests', App\Livewire\Webs\DemoRequest\Index::class)->name('demo-requests');
Route::get('/demo-requests/upsert', App\Livewire\Webs\DemoRequest\Upsert::class)->name('demo-requests.upsert');

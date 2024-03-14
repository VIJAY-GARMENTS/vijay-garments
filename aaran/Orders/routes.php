<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/orders', \App\Livewire\Orders\Order\Index::class)->name('orders');
    Route::get('/styles', \App\Livewire\Orders\Style\Index::class)->name('styles');

});

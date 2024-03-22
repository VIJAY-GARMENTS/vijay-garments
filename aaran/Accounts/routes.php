<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('cashbooks', App\Livewire\Accounts\Cashbook\Index::class)->name('cashbooks');
    Route::get('cashbooks/{mode}/create', App\Livewire\Accounts\Cashbook\Create::class)->name('cashbooks.create');
    Route::get('cashbooks/{id}/edit', App\Livewire\Accounts\Cashbook\Update::class)->name('cashbooks.edit');

});

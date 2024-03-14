<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/contacts', App\Livewire\Master\Contact\Index::class)->name('contacts');
    Route::get('/contacts/{id}/upsert', App\Livewire\Master\Contact\Upsert::class)->name('contacts.upsert');
    Route::get('/products', App\Livewire\Master\Product\Index::class)->name('products');
    Route::get('products/{id}/upsert', App\Livewire\Master\Product\Upsert::class)->name('products.upsert');
    Route::get('/companies', App\Livewire\Master\Company\Index::class)->name('companies');
    Route::get('companies/{id}/upsert', App\Livewire\Master\Company\Upsert::class)->name('companies.upsert');

});

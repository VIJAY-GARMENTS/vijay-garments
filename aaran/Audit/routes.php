<?php

use Illuminate\Support\Facades\Route;

//Audit
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('clients', App\Livewire\Audit\Client\Index::class)->name('clients');
    Route::get('clients/{id}/show', App\Livewire\Audit\Client\Show::class)->name('clients.show');

    Route::get('fees', App\Livewire\Audit\Client\Fee::class)->name('fees');

    Route::get('banks', App\Livewire\Audit\Client\Bank::class)->name('banks');
    Route::get('banks/{id}/details', App\Livewire\Audit\Client\BankDetails::class)->name('banks.details');

    Route::get('gstfillings', App\Livewire\Audit\Client\Filling::class)->name('gstfillings');

    Route::get('bankBalances', App\Livewire\Audit\Client\Balance::class)->name('bankBalances');

    Route::get('salesTracks', App\Livewire\Audit\Client\Sub\SalesTrack\Index::class)->name('salesTracks');
    Route::get('salesTracks/{id}/items', App\Livewire\Audit\Client\Sub\SalesTrack\Items::class)->name('salesTracks.items');
    Route::get('salesTracks/{id}/bills', App\Livewire\Audit\Client\Sub\SalesTrack\Bill::class)->name('salesTracks.bills');
    Route::get('salesTracks/{id}/billItems', App\Livewire\Audit\Client\Sub\SalesTrack\BillItem::class)->name('salesTracks.billItems');
    Route::get('salesTracks/{id}/show', App\Livewire\Audit\Client\Sub\SalesTrack\Show::class)->name('salesTracks.show');
});

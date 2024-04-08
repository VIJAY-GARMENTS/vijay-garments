<?php

use Illuminate\Support\Facades\Route;

//Offset
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/saleOffsets', App\Livewire\Offset\Sales\Index::class)->name('saleOffsets');
    Route::get('/saleOffsets/{id}/upsert', App\Livewire\Offset\Sales\Upsert::class)->name('saleOffsets.upsert');
    Route::get('/saleOffsets/{id}/print', App\Http\Controllers\Offset\Sales\InvoiceController::class)->name('saleOffsets.print');

    Route::get('/saleOffsets/reports', App\Livewire\Offset\Sales\Report::class)->name('saleOffsets.reports');

    Route::get('/purchaseOffsets', App\Livewire\Offset\Purchase\Index::class)->name('purchaseOffsets');
    Route::get('/purchaseOffsets/{id}/upsert', App\Livewire\Offset\Purchase\Upsert::class)->name('purchaseOffsets.upsert');
//    Route::get('/purchaseOffsets/{id}/print', App\Http\Controllers\Offset\Purchase\InvoiceController::class)->name('purchaseOffsets.print');

});

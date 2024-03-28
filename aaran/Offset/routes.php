<?php

use Illuminate\Support\Facades\Route;

//Offset
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/salesoffset', App\Livewire\Offset\Sales\Index::class)->name('salesoffset');
    Route::get('/salesoffset/reports', App\Livewire\Offset\Sales\Report::class)->name('salesoffset.reports');
    Route::get('/salesoffset/{id}/upsert', App\Livewire\Offset\Sales\Upsert::class)->name('salesoffset.upsert');
//    Route::get('/salesoffset/{id}/print', App\Http\Controllers\Offset\Sales\InvoiceController::class)->name('salesoffset.print');

    Route::get('/purchasesoffset', App\Livewire\Offset\Purchase\Index::class)->name('purchasesoffset');
    Route::get('/purchasesoffset/{id}/upsert', App\Livewire\Offset\Purchase\Upsert::class)->name('purchasesoffset.upsert');
//    Route::get('/purchasesoffset/{id}/print', App\Http\Controllers\Offset\Purchase\InvoiceController::class)->name('purchasesoffset.print');

    Route::get('/receiptsoffset', App\Livewire\Offset\Receipt\Index::class)->name('receiptsoffset');
    Route::get('/receiptsoffset/{id}/upsert', App\Livewire\Offset\Receipt\Upsert::class)->name('receiptsoffset.upsert');

    Route::get('/paymentsoffset', App\Livewire\Offset\Payment\Index::class)->name('paymentsoffset');
    Route::get('/paymentsoffset/{id}/upsert', App\Livewire\Offset\Payment\Upsert::class)->name('paymentsoffset.upsert');

});

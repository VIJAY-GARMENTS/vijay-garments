<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/todos', \App\Livewire\Taskmanager\Todos\Index::class)->name('todos');

    Route::get('tasks', App\Livewire\Taskmanager\Task\Index::class)->name('tasks');
    Route::get('myTasks', App\Livewire\Taskmanager\Task\Mytask::class)->name('myTasks');
    Route::get('allTasks', App\Livewire\Taskmanager\Task\AllTask::class)->name('allTasks');
    Route::get('tasks/{id}/replies', App\Livewire\Taskmanager\Task\Show::class)->name('tasks.replies');

    Route::get('activities', App\Livewire\Taskmanager\Activities\Index::class)->name('activities');
    Route::get('activities/admins', App\Livewire\Taskmanager\Activities\Admin::class)->name('activities.admins');
    Route::get('noticeboards', App\Livewire\Taskmanager\NoticeBoard\Index::class)->name('noticeboards');
    Route::get('payment-slips', App\Livewire\Taskmanager\PaymentSlip\Index::class)->name('payment-slips');

    Route::get('turnovers', App\Livewire\Taskmanager\Turnover\Index::class)->name('turnovers');
    Route::get('gstcredits', App\Livewire\Taskmanager\Gstcredit\Index::class)->name('gstcredits');
    Route::get('bankStatementEntries', App\Livewire\Taskmanager\BankStatementEntry\Index ::class)->name('bankStatementEntries');

});

<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\General\HomePage;
use App\Livewire\Pages\General\ContactPage;

use App\Livewire\Pages\Dashboards\Index as Dashboard;

use App\Livewire\Pages\Users\Index as UsersPage;
use App\Http\Controllers\UserController;
use App\Livewire\Pages\ContactMessages\Index as ContactMessagesPage;
use App\Livewire\Pages\ContactMessages\Edit as EditContactMessages;

Route::get('/', HomePage::class)->name('home-page');
Route::get('contact', ContactPage::class)->name('contact-page');

Route::middleware(['authenticated'])->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

Route::middleware(['admins'])->group(function() {
    Route::get('users', UsersPage::class)->name('users.index');
    Route::resource('users', UserController::class)->only(['create', 'store', 'edit', 'update']);

    Route::get('contact-messages', ContactMessagesPage::class)->name('contact-messages.index');
    Route::get('contact-messages/{message}/edit', EditContactMessages::class)->name('contact-messages.edit');
});

require __DIR__.'/auth.php';

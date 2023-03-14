<?php

use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/phpinfo', fn () => phpinfo());

Route::get('/', Index::class)->name('index');

<?php

use App\Http\Livewire\Index;
use Illuminate\Support\Facades\Route;

// Route::get('/cars');

Route::get('/', Index::class)->name('index');

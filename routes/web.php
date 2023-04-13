<?php

use App\Http\Livewire\Index;
use App\Http\Livewire\Pages\Cars;
use Illuminate\Support\Facades\Route;

Route::get('/cars', Cars::class)->name('cars.index');

Route::get('/', Index::class)->name('index');

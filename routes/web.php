<?php

use App\Http\Livewire\Index;
use App\Http\Livewire\Pages\{Cars, Manufacturer};
use Illuminate\Support\Facades\Route;

Route::get('/manufacturer/{manufacturer}', Manufacturer::class)->name('manufacturers.index');
Route::get('/cars', Cars::class)->name('cars.index');

Route::get('/', Index::class)->name('index');

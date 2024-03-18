<?php

use App\Livewire\Index\Whats;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('in', Whats::class);

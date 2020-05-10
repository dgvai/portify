<?php

use Illuminate\Support\Facades\Route;

    Route::get('/','DashboardController@dashboard')->name('dashboard');
    
    Route::prefix('data')->group(function(){

    });
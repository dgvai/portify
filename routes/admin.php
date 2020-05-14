<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@dashboard')->name('dashboard');
    
    Route::prefix('data')->group(function(){

    });
});
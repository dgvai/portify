<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@dashboard')->name('dashboard');

    Route::prefix('get')->group(function(){
        Route::get('visitors','DashboardController@getVisitorLog')->name('get.visitor');
    });
    
    Route::prefix('data')->group(function(){

    });

    Route::prefix('server')->group(function(){
        Route::get('monitor','ServerController@monitor')->name('server.monitor');
    });
});
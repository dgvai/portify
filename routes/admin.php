<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@dashboard')->name('dashboard');

    Route::prefix('get')->group(function(){
        Route::get('visitors','DashboardController@getVisitorLog')->name('get.visitor');
    });
    
    Route::prefix('portfolio')->group(function(){
        Route::get('basic-data','Portfolio\DataController@index')->name('portfolio.basic');

        Route::post('update/data','Portfolio\DataController@updateData')->name('portfolio.update.data');
        Route::post('update/cover','Portfolio\DataController@updateCover')->name('portfolio.update.cover');
    });

    Route::prefix('server')->group(function(){
        Route::get('monitor','ServerController@monitor')->name('server.monitor');
    });
});
<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@dashboard')->name('dashboard');

    Route::prefix('get')->group(function(){
        Route::get('visitors','DashboardController@getVisitorLog')->name('get.visitor');
        Route::get('project','Portfolio\ProjectController@getProject')->name('get.project');
        Route::get('projects','Portfolio\ProjectController@getProjects')->name('get.projects');
    });
    
    Route::prefix('portfolio')->group(function(){
        Route::get('basic-data','Portfolio\DataController@index')->name('portfolio.basic');
        Route::post('update/data','Portfolio\DataController@updateData')->name('portfolio.update.data');
        Route::post('update/cover','Portfolio\DataController@updateCover')->name('portfolio.update.cover');

        Route::get('projects','Portfolio\ProjectController@index')->name('portfolio.projects');
        Route::post('add/project','Portfolio\ProjectController@add')->name('portfolio.add.project');
        Route::post('update/project','Portfolio\ProjectController@update')->name('portfolio.update.project');
        Route::post('delete/project','Portfolio\ProjectController@delete')->name('portfolio.delete.project');
    });

    Route::prefix('server')->group(function(){
        Route::get('monitor','ServerController@monitor')->name('server.monitor');
    });
});
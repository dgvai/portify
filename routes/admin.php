<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@dashboard')->name('dashboard');

    Route::prefix('get')->group(function(){
        Route::get('visitors','DashboardController@getVisitorLog')->name('get.visitor');
        Route::get('project','Portfolio\ProjectController@getProject')->name('get.project');
        Route::get('projects','Portfolio\ProjectController@getProjects')->name('get.projects');
        Route::get('service','Portfolio\ServiceController@getService')->name('get.service');
        Route::get('services','Portfolio\ServiceController@getServices')->name('get.services');
    });
    
    Route::prefix('portfolio')->group(function(){
        Route::get('basic-data','Portfolio\DataController@index')->name('portfolio.basic');
        Route::post('update/data','Portfolio\DataController@updateData')->name('portfolio.update.data');
        Route::post('update/cover','Portfolio\DataController@updateCover')->name('portfolio.update.cover');

        Route::get('services','Portfolio\ServiceController@index')->name('portfolio.services');
        Route::post('add/services','Portfolio\ServiceController@add')->name('portfolio.add.services');
        Route::post('update/services','Portfolio\ServiceController@update')->name('portfolio.update.services');
        Route::post('delete/services','Portfolio\ServiceController@delete')->name('portfolio.delete.services');

        Route::get('projects','Portfolio\ProjectController@index')->name('portfolio.projects');
        Route::post('add/project','Portfolio\ProjectController@add')->name('portfolio.add.project');
        Route::post('update/project','Portfolio\ProjectController@update')->name('portfolio.update.project');
        Route::post('delete/project','Portfolio\ProjectController@delete')->name('portfolio.delete.project');

        Route::get('resume','Portfolio\ResumeController@index')->name('portfolio.resume');
        Route::post('resume/toggle','Portfolio\ResumeController@toggle')->name('portfolio.resume.toggle');
        Route::post('resume/upload','Portfolio\ResumeController@upload')->name('portfolio.resume.upload');
    });

    Route::prefix('server')->group(function(){
        Route::get('monitor','ServerController@monitor')->name('server.monitor');
    });
});
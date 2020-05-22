<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/','DashboardController@dashboard')->name('dashboard');

    Route::prefix('get')->group(function(){
        Route::get('visitors','DashboardController@getVisitorLog')->name('get.visitor');
        Route::get('downloads','DashboardController@getDownloadLog')->name('get.downloads');
        Route::get('project','Portfolio\ProjectController@getProject')->name('get.project');
        Route::get('projects','Portfolio\ProjectController@getProjects')->name('get.projects');
        Route::get('service','Portfolio\ServiceController@getService')->name('get.service');
        Route::get('services','Portfolio\ServiceController@getServices')->name('get.services');
        Route::get('inbox','InboxController@getInbox')->name('get.inbox');
        Route::get('inboxes','InboxController@getInboxes')->name('get.inboxes');
        Route::get('social','Settings\SiteController@getSocial')->name('get.social');
        Route::get('socials','Settings\SiteController@getSocials')->name('get.socials');
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

    Route::prefix('inbox')->group(function(){
        Route::get('/','InboxController@index')->name('inbox');
    });

    Route::prefix('settings')->group(function(){
        Route::get('/site','Settings\SiteController@index')->name('settings.site');
        Route::get('/app','Settings\AppController@index')->name('settings.app');
        Route::get('/user','Settings\UserController@index')->name('settings.user');

        Route::post('save/setting','Settings\SiteController@savePrimarySetting')->name('save.setting');
        Route::post('add/social','Settings\SiteController@addSocial')->name('add.social');
        Route::post('edit/social','Settings\SiteController@editSocial')->name('edit.social');
        Route::post('delete/social','Settings\SiteController@deleteSocial')->name('delete.social');

        Route::post('set/bg','Settings\SiteController@setIntroBg')->name('set.bg');
        Route::post('set/loader','Settings\SiteController@setLoader')->name('set.loader');

        Route::post('change/config','Settings\AppController@setConfig')->name('set.config');

        Route::post('change/user','Settings\UserController@setUser')->name('set.user');
    });

    Route::prefix('server')->group(function(){
        Route::get('monitor','ServerController@monitor')->name('server.monitor');
    });
});
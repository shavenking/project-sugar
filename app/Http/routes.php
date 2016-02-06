<?php

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
    Route::resource('freetime', FreetimeController::class);

    Route::resource('activity.available-date', AvailableDateController::class);
    Route::resource('activity.attendee', AttendeeController::class);
    Route::resource('activity', ActivityController::class);    
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/', function () {
        return view('welcome');
    });
});

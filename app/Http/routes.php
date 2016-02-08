<?php

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
    Route::resource('freetime', FreetimeController::class);

    Route::resource('activity.available-date', AvailableDateController::class);
    Route::resource('activity.attendee', AttendeeController::class);
    Route::resource('activity', ActivityController::class);

    Route::resource('goals.tasks', TaskController::class);
    Route::resource('goals', GoalController::class);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', HomeController::class . '@index');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('activity.attendee', AttendeeController::class);
    Route::resource('activity', ActivityController::class);
});

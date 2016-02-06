<?php

Route::group(['middleware' => 'auth'], function () {
    Route::resource('freetime', FreetimeController::class);

    Route::resource('activity.available-date', AvailableDateController::class);
    Route::resource('activity.attendee', AttendeeController::class);
    Route::resource('activity', ActivityController::class);    
});

<?php

Route::group(['middleware' => 'auth'], function () {
    Route::resource('freetime', FreetimeController::class);
    Route::resource('activity', ActivityController::class);    
});

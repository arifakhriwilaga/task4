<?php

Route::get('user/sign-up','AuthenticationsController@sign_up')->name('sign_up');
Route::post('user/sign-up/store','AuthenticationsController@sign_up_store')->name('sign_up_store');
Route::get('user/login','AuthenticationsController@login')->name('login');
Route::get('user/forgot-password','AuthenticationsController@forgot_password')->name('forgot_password');

?>
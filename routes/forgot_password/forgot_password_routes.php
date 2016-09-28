<?php
Route::get('reset-password','ForgotPasswordsController@reset_password')->name('reset-password');
Route::post('reset-password/store','ForgotPasswordsController@reset_password_store')->name('reset-password-store');
Route::get('change-password/{forgot_token}','ForgotPasswordsController@change_password')->name('change-password');
Route::post('change-password/store/{forgot_token}','ForgotPasswordsController@change_password_store')->name('change-password-store');

?>
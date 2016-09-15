<?php

Route::get('officer-index','OfficersController@index')->name('officer_index');
Route::get('officer-create','OfficersController@create')->name('officer_create');
Route::get('officer-delete/{officers}','OfficersController@destroy')->name('officer_delete');
Route::get('officer-show/{officers}','OfficersController@show')->name('officer_show');
Route::get('officer-edit/{officers}','OfficersController@edit')->name('officer_edit');
Route::put('officer-update/{officers}','OfficersController@update')->name('officer_update');
Route::post('officer-store','OfficersController@store')->name('officer_store');

?>
<?php
Route::post('import-store','ExcelsController@import_store')->name('import_store');
Route::get('import','ExcelsController@import')->name('import');
Route::get('export/{type}','ExcelsController@export')->name('export');
?>
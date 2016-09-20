<?php

Route::get('article-index','ArticlesController@index')->name('article_index');
Route::get('article-create','ArticlesController@create')->name('article_create');
Route::get('article-delete/{articles}','ArticlesController@destroy')->name('article');
Route::get('article-show/{articles}','ArticlesController@show')->name('article_show');
Route::get('article-edit/{articles}','ArticlesController@edit')->name('article_edit');
Route::put('article-update/{articles}','ArticlesController@update')->name('article_update');
Route::post('article-store','ArticlesController@store')->name('article_store');

?>
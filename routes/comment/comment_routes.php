<?php
Route::post('comment-store','CommentsController@store')->name('comment_store');
Route::get('comment-show/{articles}','CommentsController@show')->name('comment_show');
?>
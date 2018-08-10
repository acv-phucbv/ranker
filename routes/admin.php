<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'Controller@index')->name('admin');

Route::get('posts', 'PostsController@index')->name('admin.posts.index');
Route::get('users', 'UsersController@index')->name('admin.users.index');
//Route::get('users/create', 'UsersController@create')->name('admin.users.create');
//Route::get('users/{user}', 'UsersController@show')->where(['user' => '[0-9]+'])->name('admin.users.show');
//Route::get('users/{user}/edit', 'UsersController@edit')->name('admin.users.edit');
//Route::put('users/{user}', 'UsersController@update')->name('admin.users.update');
//Route::get('users/{user}/password', 'UsersController@editPassword')->name('admin.users.edit_password');
//Route::put('users/{user}/password', 'UsersController@updatePassword')->name('admin.users.update_password');
//Route::delete('users/{user}', 'UsersController@destroy')->name('admin.users.destroy');
//Route::delete('users', 'UsersController@batchDestroy')->name('admin.users.batch_destroy');

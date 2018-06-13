<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});        */

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('signup','UsersController@create')->name('signup');
Route::resource('users','UsersController');

Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');

Route::get('signup/comfirm/{token}','UsersController@confirmEmail')->name('confirm_email');

Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.update');

Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);



Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');


Route::get('/exam/provide','ExamController@provide')->name('exam.provide');
Route::post('/exam/provide','ExamController@store')->name('exam.provide');

Route::get('/exam/answer','ExamController@answer')->name('exam.answer');
Route::post('/exam/answer','ExamController@result')->name('exam.answer'); 
Route::get('/exam/{exam}/edit','ExamController@edit')->name('exam.edit');
Route::patch('/exam/{exam}/update','ExamController@update')->name('exam.update');
Route::delete('/exam/{exam}/destroy','ExamController@destroy')->name('exam.destroy');
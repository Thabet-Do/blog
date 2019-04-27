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
use Illuminate\Support\Facades\Route;//comment this line later
Route::GET('/', function () {
    return view('welcome');
});


//Update User
Route::PUT('/admin/user/{user}','RegistrationController@update')->name('update');

Route::get('/admin/user/{user}/email','RegistrationController@sendEmail');



//////////////////////////////[------Working------]/////////////////////////////////

//Create User
Route::POST('/admin/user','RegistrationController@register')->name('register');

//Delete User
Route::DELETE('/admin/user/{user}','RegistrationController@delete')->name('delete');

//Get User
Route::GET('/admin/user/{user}','RegistrationController@user')->name('user');

//List Users
Route::GET('/admin/users','RegistrationController@users')->name('users');

//Activate user
Route::GET('/admin/user/{user}/activate','RegistrationController@active')->name('user');

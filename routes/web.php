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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::GET('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


//Create User
Route::POST('/admin/user','RegistrationController@register')->name('register');

//Update User
Route::PUT('/admin/user/{user}','RegistrationController@update')->name('update');

//Delete User
Route::DELETE('/admin/user/{user}','RegistrationController@delete')->name('delete');

//Get User
Route::GET('/admin/user/{user}','RegistrationController@user')->name('user');

//List Users
Route::GET('/admin/users','RegistrationController@users')->name('users');

//Activate user
Route::GET('/admin/user/{user}/activate','RegistrationController@active')->name('user');

//send email
Route::get('/admin/user/{user}/email','RegistrationController@sendEmail');
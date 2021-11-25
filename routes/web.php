<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('isLogin')->group(function (){
    Route::get('profile','UserController@profile')->name('profile');

    Route::get('logout','AuthController@logout')->name('logout');


    Route::resource('todos', 'TodoController');
    Route::post('todos-up/{id}', 'TodoController@update')->name("todo-up");
    Route::get('del/{id}', 'TodoController@destroy')->name("todo-destroy");

    Route::middleware('isAdmin')->group(function (){
        Route::get('setAdmin/{id}', 'UserController@setAdmin')->name("setAdmin");
        Route::get('setUser/{id}', 'UserController@setUser')->name("setUser");
        Route::get('users', 'UserController@users')->name("users");
    });



    Route::get('completeTodo/{id}', 'TodoController@completeTodo')->name("completeTodo");

    Route::get('getAdminTodosRecord', 'TodoController@getAdminTodosRecord')->name("getAdminTodosRecord");
    Route::get('getTodosRecord', 'TodoController@getTodosRecord')->name("getTodosRecord");
});

Route::get('/','HomeController@home');
Route::get('/home','HomeController@home')->name('home');

Route::get('login','AuthController@login')->name('login');
Route::get('register','AuthController@register')->name('register');

Route::post('loginPost','AuthController@loginPost')->name('loginPost');
Route::post('registerPost','AuthController@registerPost')->name('registerPost');


//Route::get('todos','TodoController@index')->name('todos');
//Route::get('todos','TodoController@create')->name('todos-create');


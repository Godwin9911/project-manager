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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin-login', 'Auth\AdminLoginController@showLoginForm');

Route::post('/admin-login', ['as'=>'admin-login', 'uses'=>'Auth\AdminLoginController@login']);

Route::get('/admin-dashboard', 'AdminDashboardController@showAdminDashboard')->middleware('is-admin');

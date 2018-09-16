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

// Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('ping', ['as' => 'ping.ping', 'uses' => 'PingController@ping']);
Route::post('ping', ['as' => 'ping.pingHost', 'uses' => 'PingController@pingHost']);

Route::get('port-check', ['as' => 'port.check', 'uses' => 'PortCheckController@check']);
Route::post('port-check', ['as' => 'port.portCheck', 'uses' => 'PortCheckController@checkPort']);

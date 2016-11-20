<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
/*
 * tour
 */
Route::any('/addtext','TourController@addText'); //行程添加页面展示和 行程添加处理
Route::get('/itipieces','TourController@itiPieces'); //行程添加页面展示和 行程添加处理
Route::any('/modifyiti/{itid?}','TourController@modifyIti'); //行程添加页面展示和 行程添加处理

Route::auth(); //php artisan make:atuh 自动生成,同时自动生成了homeController

/*
登录路由
*/
Route::get('/', 'HomeController@index'); //php artisan make:atuh 自动生成

/*
 * 酒店类路由
 */
Route::get('/hotel', 'HotelController@show');
Route::any('/hoteladd', 'HotelController@add');


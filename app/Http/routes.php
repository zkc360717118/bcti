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
Route::any('/hotelEdit/{h?}', 'HotelController@edit');

/*
 * 餐厅类路由
 */
Route::get('/food','FoodController@show');
Route::any('/foodadd','FoodController@add');
Route::any('/foodEdit/{f?}','FoodController@edit');

/*
 *车队类路由
 */
Route::get('/car','CarController@show');
Route::any('/caradd','CarController@add');
Route::any('/carEdit/{c?}','CarController@edit');

/*
门票类路由
*/
Route::get('/ticket','TicketController@show');
Route::any('/ticketadd','TicketController@add');
Route::any('/ticketEdit/{t?}','TicketController@edit');

/*
 * 导游类路由
 */
Route::get('/guide','GuideController@show');
Route::any('/guideadd','GuideController@add');
Route::any('/guideEdit/{g?}','GuideController@edit');








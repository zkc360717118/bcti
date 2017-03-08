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
 * 行程碎片
 */
Route::any('/addtext','TourController@addText'); //行程添加页面展示和 行程添加处理
Route::get('/itipieces','TourController@itiPieces'); //行程添加页面展示和 行程添加处理
Route::any('/modifyiti/{itid?}','TourController@modifyIti'); //行程添加页面展示和 行程添加处理
Route::get('/getpiece/{code}','TourController@pieceAjax');//通过约定的代码获取对应的英文行程

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
Route::get('gethotel/{code}','HotelController@hotelAjax');//ajax 获取酒店的信息
Route::get('checkhotelcode/{code}','HotelController@codeIfExist');//ajax 查询code是否已经重复

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

/*
 * 客户资源类路由
 */
Route::get('/company','CrmController@show');
Route::any('/companyadd','CrmController@add');
Route::any('/companyEdit/{c?}','CrmController@edit');
Route::post('/contactEdit/{c?}','CrmController@contactEdit');

Route::get('/getcompanycontact/{cid}','CrmController@contactJson');

/*
 *报价类路由！！important!!
 */
Route::any('/maketour','QuoteController@maketour');
Route::any('/calculate/{qid}','QuoteController@calculate');
Route::post('/storequote','QuoteController@storeQuote');
Route::any('/finalquote/{pid}','QuoteController@storeFinalQuote');
Route::any('/word/{qid}','QuoteController@word');










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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
	'as' => 'index',
	'uses' => 'SiteController@index'
]);

Route::get('article/{id}', 'SiteController@show')->name('articleShow');

Route::get('comment/{id}', 'CommentController@show')->name('commentShow');

// ======== ADMIN =========================
Route::get('admin', 'AdminArtickleController@index')->name('admin');

Route::group(['prefix' => 'admin/article'], function () {

	Route::get('index', 'AdminArtickleController@index')->name('admin/article/index');
	Route::post('create', 'AdminArtickleController@store')->name('admin/article/create');
	Route::get('create', 'AdminArtickleController@create')->name('admin/article/create');
	Route::get('update', 'AdminArtickleController@update')->name('admin/article/update');
	Route::get('delete', 'AdminArtickleController@delete')->name('admin/article/delete'); 
});
Route::group(['prefix' => 'admin/category'], function () {

	Route::get('index', 'AdminCategoryController@index')->name('admin/category/index');;
	Route::post('create', 'AdminCategoryController@store')->name('admin/category/create');;
	Route::get('create', 'AdminCategoryController@create')->name('admin/category/create');;
	Route::get('update', 'AdminCategoryController@update')->name('admin/category/update');;
	Route::get('delete', 'AdminCategoryController@delete')->name('admin/category/delete');;
});
// ======== END ADMIN =======================

// Route::get('page/add', 'IndexController@add');

// Route::post('page/add', 'IndexController@store')->name('articleStore');

// Route::delete('page/delete/{article}', function(\App\Article $article) {

// 	// $article_tmp = \App\Article::where('id', $article)->first();

// 	$article->delete();

// 	return redirect('/');

// })->name('articleDelete');
// //------------------------------

// //------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Маршруты аутентификации...
Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('login', 'Auth\AuthController@postLogin')->name('login');
Route::get('logout', 'Auth\AuthController@getLogout');

// Маршруты регистрации...
Route::get('register', 'Auth\AuthController@getRegister')->name('register');
Route::post('register', 'Auth\AuthController@postRegister')->name('register');

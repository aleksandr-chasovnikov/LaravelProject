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

Route::get('article/{id}', 'ArticleController@show')->name('articleShow');
Route::get('index/{categoryId}', 'ArticleController@showByCategory')->name('articleByCategory');

Route::get('comment/{id}', 'CommentController@show')->name('commentShow');
Route::post('article', 'CommentController@store')->name('commentStore');
Route::delete('delete/{comment}', 'CommentController@delete')->name('commentDelete');

// ======== AdminPanel =========================
// Route::get('admin/comment', 'Admin\AdminCommentController@index')->name('commentIndex');

Route::group(['prefix' => 'admin/article'], function () {

	Route::get('index', 'Admin\AdminArticleController@index')->name('adminIndex');
	Route::post('create', 'Admin\AdminArticleController@store')->name('articleStore');
	Route::get('create', 'Admin\AdminArticleController@create')->name('articleCreate');
	Route::get('update/{id}', 'Admin\AdminArticleController@update')->name('articleUpdate');
	Route::post('update', 'Admin\AdminArticleController@postUpdate')->name('articlePostUpdate');
	Route::delete('delete/{article}', 'Admin\AdminArticleController@delete')->name('articleDelete');
});

Route::group(['prefix' => 'admin/category'], function () {

	Route::get('index', 'Admin\AdminCategoryController@index')->name('categoryIndex');
	Route::post('create', 'Admin\AdminCategoryController@store')->name('categoryStore');
	Route::get('create', 'Admin\AdminCategoryController@create')->name('categoryCreate');
	Route::get('update/{id}', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
	Route::get('delete/{article}', 'Admin\AdminCategoryController@delete')->name('categoryDelete');
// Route::delete('delete/{comment}', 'CommentController@delete')->name('commentDelete');
});
// ======== END AdminPanel =======================

// ======== Authentication =======================
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
// ======== END Authentication =======================

// Route::get('page/add', 'IndexController@add');

// Route::post('page/add', 'IndexController@store')->name('articleStore');

// Route::delete('page/delete/{article}', function(\App\Article $article) {

// 	// $article_tmp = \App\Article::where('id', $article)->first();

// 	$article->delete();

// 	return redirect('/');

// })->name('articleDelete');
// //------------------------------

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

// ======== MyExample =======================
// Route::post('registerX.{id?}', function() {

// 	$route = Route::current(); // new Route
// 	echo $route->getName; // покажет 'registerX'
// 	echo $route->getParameter('id', 25); // id, 25 - default
// 	print_r($route->parameters()); // покажет массив с параметрами

// })->name('registerX');

// php artisan make:controller PhotoController --resource --model=Photo
// Route::resource('/pages', 'PhotoController', [
// 'except'=> ['index', 'show'] // исключить методы: index, show
// ]); // CRUD (RESTfull: post, get, put, delete)

// Route::controller('/pages', 'NewController'); // methods: getShow, getIndex, postStore и др.

// uses ... as -> назначить имя,
// Route::controller('/pages', ['uses' => 'NewController', 'as' => 'article', 'middleware' => 'mymiddle:admin']); //admin - параметр
// Route::controller('/pages', ['uses' => 'NewController', 'as' => 'article'])->middleware(['mymiddle']); 

// ============================================

// Contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');
Route::post('contact.mail', 'ContactController@contactMail')->name('contactMail');

// Articles
Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index']);
Route::get('article.{id}', 'SiteController@show')->name('articleShow');
Route::get('category.{categoryId}', 'SiteController@showByCategory')->name('showByCategory');
Route::get('tag.{tagId}', 'SiteController@showByTag')->name('showByTag');

// Comments
Route::get('comment{id}', 'CommentController@show')->name('commentShow');
Route::post('article', 'CommentController@store')->name('commentStore');
Route::delete('delete.{comment}', 'CommentController@delete')->name('commentDelete');

// ======== AdminPanel =========================
Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'article'], function() {
// Route::group(['prefix' => 'admin/article', 'middleware' => ['auth', 'admin']], function () {

        Route::get('index', 'Admin\AdminArticleController@index')->name('adminIndex');
        Route::post('create', 'Admin\AdminArticleController@store')->name('articleStore');
        Route::get('create', 'Admin\AdminArticleController@create')->name('articleCreate');
        Route::get('update.{id}', 'Admin\AdminArticleController@edit')->name('articleEdit');
        Route::post('update', 'Admin\AdminArticleController@update')->name('articleUpdate');
        Route::delete('delete.{id}', 'Admin\AdminArticleController@destroy')->name('articleDelete');

        Route::post('upload', 'Admin\AdminArticleController@uploadFile')->name('upload');
    });

    Route::group(['prefix' => 'tag'], function() {

        Route::get('index', 'Admin\AdminTagController@index')->name('tagIndex');
        Route::post('create', 'Admin\AdminTagController@store')->name('tagStore');
        Route::get('create', 'Admin\AdminTagController@create')->name('tagCreate');
        Route::get('update.{id}', 'Admin\AdminTagController@edit')->name('tagEdit');
        Route::post('update', 'Admin\AdminTagController@update')->name('tagUpdate');
        Route::delete('delete.{id}', 'Admin\AdminTagController@destroy')->name('tagDelete');
    });

    Route::group(['prefix' => 'category'], function() {

        Route::get('index', 'Admin\AdminCategoryController@index')->name('categoryIndex');
        Route::post('create', 'Admin\AdminCategoryController@store')->name('categoryStore');
        Route::get('create', 'Admin\AdminCategoryController@create')->name('categoryCreate');
        Route::get('update.{id}', 'Admin\AdminCategoryController@edit')->name('categoryEdit');
        Route::get('update', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
        Route::get('delete.{category}', 'Admin\AdminCategoryController@delete')
            ->name('categoryDelete');
    });
});

// ======== END AdminPanel =======================

// ======== Authentication =======================

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// login
Route::get('loginX', 'Auth\LoginController@showLoginForm')->name('loginX');
Route::post('loginX', 'Auth\LoginController@login')->name('loginX');
Route::get('logoutX', 'Auth\LoginController@logout')->name('logoutX');

// register
Route::get('registerX', 'Auth\RegisterController@showRegistrationForm')->name('registerX');
Route::post('registerX', 'Auth\RegisterController@register')->name('registerX');

// ======== END Authentication =======================

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
Route::get('comment.index', 'CommentController@index')->name('commentIndex');
Route::get('comment.{id}', 'CommentController@show')->name('commentShow');
Route::post('comment.create', 'CommentController@store')->name('commentStore');
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
        Route::get('restore.{article}', 'Admin\AdminArticleController@restore')
            ->name('articleRestore');
        Route::get('status.{article}', 'Admin\AdminArticleController@statusChange')
            ->name('articleStatusChange');
    });

    Route::group(['prefix' => 'tag'], function() {

        Route::get('index', 'Admin\AdminTagController@index')->name('tagIndex');
        Route::post('create', 'Admin\AdminTagController@store')->name('tagStore');
        Route::get('create', 'Admin\AdminTagController@create')->name('tagCreate');
        Route::get('update.{id}', 'Admin\AdminTagController@edit')->name('tagEdit');
        Route::any('update', 'Admin\AdminTagController@update')->name('tagUpdate');
        Route::delete('delete.{id}', 'Admin\AdminTagController@destroy')->name('tagDelete');
        Route::get('restore.{tag}', 'Admin\AdminTagController@restore')
            ->name('tagRestore');
        Route::get('status.{tag}', 'Admin\AdminTagController@statusChange')
            ->name('tagStatusChange');
    });

    Route::group(['prefix' => 'category'], function() {

        Route::get('index', 'Admin\AdminCategoryController@index')->name('categoryIndex');
        Route::post('create', 'Admin\AdminCategoryController@store')->name('categoryStore');
        Route::get('create', 'Admin\AdminCategoryController@create')->name('categoryCreate');
        Route::get('update.{id}', 'Admin\AdminCategoryController@edit')->name('categoryEdit');
        Route::any('update', 'Admin\AdminCategoryController@update')->name('categoryUpdate');
        Route::delete('category.{category}', 'Admin\AdminCategoryController@destroy')
            ->name('categoryDelete');
        Route::get('category.restore.{category}', 'Admin\AdminCategoryController@restore')
            ->name('categoryRestore');
        Route::get('status.{category}', 'Admin\AdminCategoryController@statusChange')
            ->name('categoryStatusChange');
    });

    Route::resource('file', 'Admin\AdminFileController', [
        'only' => [
            'store',
            'update',
            'destroy',
        ],
        [
            'names' => [
                'store' => 'file.store',
                'update' => 'file.update',
                'destroy' => 'file.destroy',
            ]
        ]
    ]);
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

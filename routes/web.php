<?php

use App\Article;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => ['CheckLogin']], function() {
    Route::prefix('blog')->group(function() {
        Route::group(['middleware' => ['CheckMember']], function() {
            Route::get('/', 'ArticleController@blog')->name('blog');
            Route::get('/create', 'ArticleController@create')->name('article.create');
            Route::post('/store', 'ArticleController@store')->name('article.store');
        });
        Route::group(['middleware' => ['CheckAdmin']], function() {
            Route::get('/all', 'ArticleController@allblog')->name('allblog');
        });
        Route::post('/delete/{id}', 'ArticleController@destroy')->name('article.delete');
    });

    Route::prefix('user')->group(function() {
        Route::group(['middleware' => ['CheckAdmin']], function() {
            Route::get('/view', 'UserController@index')->name('view_user');
            Route::post('/delete/{id}', 'UserController@destroy')->name('delete_user');
        });
        Route::get('/show', 'UserController@show')->name('profile');
        Route::post('/update/{id}', 'UserController@update')->name('update_profile');
    });
});

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'ArticleController@index')->name('home');
Route::get('/aboutus', 'UserController@aboutus')->name('aboutus');

Route::prefix('blog')->group(function() {
    Route::get('/article/{id}', 'ArticleController@show')->name('article.detail');
    Route::get('/category/{id}', 'ArticleController@perCat')->name('article.perCat');
});



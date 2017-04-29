<?php

use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/logout', function() {
	Auth::logout();
	return redirect('/');
});


Route::get('/', 'AppController@index')->name('excersise:index');
Route::get('/varakozo', 'AppController@waiting')->name('excersise:waiting');
Route::get('/megoldott', 'AppController@solved')->name('excersise:solved');
Route::get('/helytelen', 'AppController@notgood')->name('excersise:notgood');
Route::get('/nemmegoldott', 'AppController@notsolved')->name('excersise:notsolved');
Route::get('/csoportok', 'AppController@groups')->name('group:groups');

Route::get('/csoportok/{id}', 'AppController@group')->name('group:group');

Route::get('/feladat/{id}', 'SolutionController@index')->name('solution');
Route::post('/feladat/{id}', 'SolutionController@sendSolution')->name('solution:send');

Route::get('/admin', 'AdminController@index')->name('admin:index');
Route::get('/admin/bad', 'AdminController@badSolutions')->name('admin:bad');
Route::get('/admin/solved', 'AdminController@solvedSolutions')->name('admin:solved');

Route::get('/admin/solution/{id}', 'AdminController@getSolution')->name('admin:getSolution');
Route::get('/admin/solution/{id}/markSolved', 'AdminController@markSolved')->name('admin:markSolved');
Route::get('/admin/solution/{id}/markBad', 'AdminController@markBad')->name('admin:markBad');


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

Route::get('/admin/excersises', 'AdminController@listExcersises')->name('admin:excersise:list');
Route::get('/admin/excersises/add', 'AdminController@addExcersise')->name('admin:excersise:add');
Route::post('/admin/excersises/add', 'AdminController@storeExcersise')->name('admin:excersise:store');
Route::get('/admin/excersises/{id}', 'AdminController@getExcersise')->name('admin:excersise:get');
Route::get('/admin/excersises/{id}/edit', 'AdminController@editExcersise')->name('admin:excersise:edit');
Route::post('/admin/excersises/{id}/edit', 'AdminController@updateExcersise')->name('admin:excersise:update');
Route::get('/admin/excersises/{id}/delete', 'AdminController@deleteExcersise')->name('admin:excersise:delete');

Route::get('/admin/groups', 'AdminController@listGroups')->name('admin:group:list');
Route::get('/admin/groups/add', 'AdminController@addGroup')->name('admin:group:add');
Route::post('/admin/groups/add', 'AdminController@storeGroup')->name('admin:group:store');
Route::get('/admin/groups/{id}/edit', 'AdminController@editGroup')->name('admin:group:edit');
Route::post('/admin/groups/{id}/edit', 'AdminController@updateGroup')->name('admin:group:update');
Route::get('/admin/groups/{id}/delete', 'AdminController@deleteGroup')->name('admin:group:delete');

Route::get('/admin/users', 'AdminController@listUsers')->name('admin:user:list');
Route::get('/admin/users/{id}', 'AdminController@getUser')->name('admin:user:get');
Route::get('/admin/users/{id}/delete', 'AdminController@deleteUser')->name('admin:user:delete');



Route::post('/admin/comment/add', 'AdminController@storeComment')->name('admin:comment:store');
Route::get('/admin/comment/{id}/edit', 'AdminController@editComment')->name('admin:comment:edit');
Route::post('/admin/comment/{id}/edit', 'AdminController@updateComment')->name('admin:comment:update');
Route::get('/admin/comment/{id}/delete', 'AdminController@deleteComment')->name('admin:comment:delete');



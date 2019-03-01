<?php
use Illuminate\Support\Facades\Notification;
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

// BLOG 
Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');




// ADMIN ROUTES ==============
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function()
{
	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);

	Route::resource('post', 'PostController');
	Route::resource('category', 'CategoryController');
	Route::resource('tag', 'TagController');

});


// AUTHOR ROUTES ==============
Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth', 'author']], function()
{
	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);
});

Auth::routes();


// LOGIN LOGOUT
Route::get('logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

Route::get('/', function () {
    return view('frontend.index');
});


// Function Route
Route::get('markasread', function(){
	Auth::user()->notifications->markasRead();
	return redirect()->route('admin.tag.index');
})->name('markasread');

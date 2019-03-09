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



// GENERAL ROUTE GROUP==============
Route::group(['middleware'=>['auth']], function(){
	Route::post('favourite/{post}/add', ['as'=>'post.favourite', 'uses'=>'FavouriteController@add']);
	Route::post('comment/{post}', ['as'=>'comment.store', 'uses'=>'CommentController@store']);
});


// ADMIN ROUTES GROUP ==============
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function()
{
	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);

	Route::resource('post', 'PostController');
	Route::resource('category', 'CategoryController');
	Route::resource('tag', 'TagController');

});


// AUTHOR ROUTES GROUP ==============
Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth', 'author']], function()
{
	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);
});

Auth::routes();

// PAGES
Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);
Route::get('post/{slug}', ['as'=>'post.details', 'uses'=>'PostController@details']);
Route::get('search', ['as'=>'search', 'uses'=>'HomeController@search']);






// LOGIN LOGOUT
Route::get('logout', function(){
   Auth::logout();

   return redirect()->back();	
   return redirect()->route('login');
});




// Function Route
Route::get('markasread', function(){
	Auth::user()->notifications->markasRead();
	return redirect()->route('admin.tag.index');
})->name('markasread');

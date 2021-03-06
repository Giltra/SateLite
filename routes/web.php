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
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'ApplicationController@index');
  Route::get('/','ApplicationController@index')-> name('home');
  Route::get('/create', 'ApplicationController@create') -> name('create');
  Route::get('/edit', 'ApplicationController@showMade') -> name('myApps');
  Route::get('/edit/{id}', 'ApplicationController@edit') -> name('edit');
  Route::post('createComment', 'CommentController@store') -> name('createComment');
  Route::get('/application/{id}', 'ApplicationController@show') -> name('appShow');
  Route::post('create', 'ApplicationController@store') -> name('createPost');
  Route::get('/edit/{id}', 'ApplicationController@edit') -> name('edit');
  Route::patch('/upload/{id}', 'ApplicationController@update') -> name('uploadPost');
  Route::get('/delete/{id}', 'ApplicationController@destroy') -> name('deleteApp');

  Route::post('order', 'OrderController@store') -> name('order');
  Route::get('/order', function() {
    return view('website.order');
  });

});



Route::get('/categories', 'CategoryController@index') -> name('categories');
Route::get('/categories/{id}', 'CategoryController@show')-> name('category');

Route::get('/login', function () {
  return view('auth.login');
}) -> name('login');
Route::get('/register', function () {
  return view('auth.register');
}) -> name('register');
Route::get('userProfile', 'SearchController@profile') -> name('userProfile');

Route::get('search', 'SearchController@search');

// Buscador
//Route::post('search', function(){
//    $q = \Request::get('search');
//    $application = \App\Application::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
//    if(count($application) > 0)
//        return view('website.appShow', compact('application'))->withDetails($application)->withQuery ( $q );
//    else return view('website.appShow')->withMessage('No se encontró la app');
//});

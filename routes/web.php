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

Route::get('/', function () {
    return view('welcome',['bestsellers' => \App\Book::where('bestseller',1)->get()]);
});


//Route::get('/catalog', function () {
//    return view('pages.catalog');
//});

Route::get('/catalog', 'CatalogController@index')->name('catalog');

Route::get('/book/{book}', 'BookController@bookpage')->name('book');

Route::get('/all_stock', function () {
    return view('pages.all_stock_page');
});

Route::get('/about_us', function () {
    return view('pages.about_us');
});

Route::get('/news_page', function () {
    return view('pages.news_page');
});

Route::get('/news', function () {
    return view('pages.news');
});

Route::group(['prefix' => 'moo'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('feedback', 'FeedbackController');
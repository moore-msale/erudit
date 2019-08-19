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
    return view('welcome',['books' => \App\Book::all(), 'news' => \App\News::paginate(3)->reverse(), 'genres' => \App\Genre::all(), 'books' => \App\Book::all()]);
});

Route::get('/parser/{type}', 'ParseController@index')->name('parser.index');
Route::post('/parser/{type}', 'ParseController@parse')->name('parser.parse');

Route::get('/catalog', 'CatalogController@index')->name('catalog');
Route::get('/genre/{genre}', 'CatalogController@genre')->name('genre');

Route::get('/book/{book}', 'BookController@show')->name('book.show');

Route::get('/all_stock', function () {
    return view('pages.all_stock_page');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/about_us', function () {
    return view('pages.about_us');
});

Route::get('/news_page', function () {
    return view('pages.news_page');
});

Route::group(['prefix' => 'moo'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('feedback', 'FeedbackController');
Route::resource('news', 'NewsController');
Route::resource('user', 'UserController');


Route::get('/cart', 'Api\CartController@index')->name('cart.index');
Route::get('/cart/checkout', 'Api\CartController@checkout')->name('cart.checkout');
Route::get('/cart/add/book', 'Api\CartController@add')->name('cart.add');
Route::get('/cart/delete/book', 'Api\CartController@delete')->name('cart.delete');
Route::get('/cart/remove/book', 'Api\CartController@remove')->name('cart.remove');

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
    return view('welcome',[
        'books' => \App\Book::all(),
        'news' => \App\News::paginate(3)->reverse(),
        'genres' => \App\Genre::where('show', 1)->get(),
        'galleries' => \App\Gallery::all(),
        'stocks' => \App\Stock::where('date', '>' ,\Carbon\Carbon::now())->get(),
        'compilation' => \App\Compilation::all()->first(),
    ]);
});

Route::get('/parser/{type}', 'ParseController@index')->name('parser.index');
Route::post('/parser/{type}', 'ParseController@parse')->name('parser.parse');

Route::get('/search', 'MainController@search')->name('search');

Route::get('/catalog', 'CatalogController@index')->name('catalog');
Route::get('/genre/{genre}', 'CatalogController@genre')->name('genre');
Route::get('/category/{category}', 'CatalogController@category')->name('category');

Route::get('/book/{book}', 'BookController@show')->name('book.show');
Route::get('/books', 'Api\BookController@index')->name('book.all');

Route::get('/all_stock', function () {
    return view('pages.all_stock_page',['discounts' => \App\Book::where('discount','!=',null)->get()->reverse()]);
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/about_us', function () {
    return view('pages.about_us');
});
Route::get('/contacts', function () {
    return view('pages.contacts');
});
Route::get('/delivery', function () {
    return view('pages.delivery');
});
Route::get('/partners', function () {
    return view('pages.partners');
});

Route::get('/return_of_goods', function () {
    return view('pages.return_goods');
});

Route::get('/news_page', function () {
    return view('pages.news_page');
});
Route::get('genre_sort', 'BookController@genre_sort')->name('genre_sort');
Route::get('site_sort', 'BookController@site_sort')->name('site_sort');
Route::get('delete_duplicate', 'BookController@delete_duplicate')->name('delete_duplicate');

Route::group(['prefix' => 'moo'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('stock_create', 'StockController@create')->name('stock_create');
Route::post('stock_store', 'StockController@store')->name('stock_store');
Route::get('stock_edit/{id}', 'StockController@edit')->name('stock_edit');
Route::get('stock_delete/{id}', 'StockController@delete')->name('stock_delete');
Route::post('stock_type', 'StockController@stock_type')->name('stock_type');
Route::post('stock_category', 'StockController@stock_category')->name('stock_category');

Route::get('compilation_create', 'CompilationController@create')->name('compilation_create');
Route::post('compilation_store', 'CompilationController@store')->name('compilation_store');
Route::post('compilation_active', 'CompilationController@active')->name('compilation_active');

Route::resource('feedback', 'FeedbackController');
Route::resource('news', 'NewsController');
Route::resource('user', 'UserController');


Route::get('/cart', 'Api\CartController@index')->name('cart.index');
Route::get('/cart/checkout', 'Api\CartController@checkout')->name('cart.checkout');
Route::post('/cart', 'Api\CartController@store')->name('cart.store');
Route::get('/cart/add/book', 'Api\CartController@add')->name('cart.add');
Route::get('/cart/delete/book', 'Api\CartController@delete')->name('cart.delete');
Route::get('/cart/remove/book', 'Api\CartController@remove')->name('cart.remove');
Route::post('/discount_check', 'CatalogController@check')->name('discount_check');


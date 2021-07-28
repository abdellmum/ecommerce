<?php


use Gloudemans\Shoppingcart\Facades\Cart;


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
    return view('welcome');
});
Route::get('/boutique','ProductController@index')->name('products.index');
Route::get('/panier','CartController@index')->name('cart.index');
Route::get('/boutique/{slug}','ProductController@show')->name('products.show');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/viderpanier',function(){
    Cart::destroy();
});

Route::get('/payement','CheckoutController@index')->name('checkout.index');
route::POST('/payement','CheckoutController@store')->name('checkout.store');

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

// Route::get('/supplier', function () {
//     return view('stock.invoiceSupplier');
// });

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');

Route::get('empty', function(){
    Cart::destroy();
});

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/goToadmin','SwitchController@index')->name('goAdmin');


Route::get('pdf_form', 'PdfController@pdfForm');
Route::post('/pdf_download', 'PdfController@pdfDownload')->name('form-store');
Route::post('/pdf_download_supplier', 'PdfController@pdfSupplierDownload')->name('form-store-supplier');



Route::get('/telecharge','DownloadController@down');

Route::get('/','StockDashboardController@index')->name('dashboard.index');
Route::get('/commandes', 'StockCommandeController@index')->name('commande.index');
Route::get('/rrs','ProductController@index')->name('products.index');

Route::post('/enregistrement', 'StockCheckoutController@store')->name('stockcheckout.store');

Route::get('/panier', 'StockCartController@index')->name('stockcart.index');
Route::post("/panier/ajouter", "StockCartController@store")->name('stockcart.store');
Route::post("/panier/updat", "StockCartController@update")->name('stockcart.update');
Route::delete('/panier/{rowId}', 'StockCartController@destroy')->name('stockcart.destroy');
Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


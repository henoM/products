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

Route::get('/', 'MainController@index')->name('main');
Route::get('/view{id}', 'MainController@view')->name('main.product.view');
Route::get('/getcategory{id}', 'MainController@categoryGet')->name('category.get');
Route::get('/getsubcategory{id}', 'MainController@subcategoryGet')->name('subcategory.get');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'HomeController@products')->name('products');
Route::get('/categories', 'HomeController@categories')->name('categories');


Route::middleware('user')->group(function () {
    Route::group(['namespace' => 'Home'], function () {

         Route::get('/product/create', 'ProductController@crateProduct')->name('product.create');
         Route::post('/product/create', 'ProductController@storeProduct')->name('product.store');
         Route::get('/product/createCsv', 'ProductController@crateProductCsv')->name('product.create.csv');
         Route::post('/product/createCsv', 'ProductController@storeProductCsv')->name('csv.file.store');
         Route::get('/product/view{id}', 'ProductController@view')->name('product.view');
         Route::get('/product/update{id}', 'ProductController@update')->name('product.update');
         Route::put('/product/edit{id}', 'ProductController@edit')->name('product.edit');
         Route::get('/product/delete{id}', 'ProductController@delete')->name('product.delete');
         Route::get('/product/file{id}', 'ProductController@fileAdd')->name('file.add');
         Route::post('/product/file{id}', 'ProductController@fileStore')->name('file.store');

         Route::get('/category/create', 'CategoryController@createCategory')->name('category.create');
         Route::post('/category/create', 'CategoryController@storeCategory')->name('category.store');
         Route::get('/category/add{id}', 'CategoryController@addSubcategory')->name('add.subcategory');
         Route::post('/category/add{id}', 'CategoryController@storeSubcategory')->name('subcategory.store');

    });
});



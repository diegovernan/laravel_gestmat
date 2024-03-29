<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::redirect('/', '/home');

// Principal
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/supplierorders', 'SupplierOrderController@index')->name('supplierorders');
Route::post('/supplierorders', 'SupplierOrderController@store')->name('supplierorders.store');
Route::patch('/supplierorders/{supplierorder}', 'SupplierOrderController@update')->name('supplierorder.update');

Route::get('/customerorders', 'CustomerOrderController@index')->name('customerorders');
Route::post('/customerorders', 'CustomerOrderController@store')->name('customerorders.store');

Route::get('/inventory', 'InventoryController@index')->name('inventory');
Route::get('/inventory/{inventory}/edit', 'InventoryController@edit')->name('inventory.edit');
Route::patch('/inventory/{inventory}', 'InventoryController@update')->name('inventory.update');

Route::get('/reports', 'ReportController@index')->name('reports');

// Cadastro
Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
Route::post('/suppliers', 'SupplierController@store')->name('suppliers.store');
Route::get('/supplier/{supplier}/edit', 'SupplierController@edit')->name('supplier.edit');
Route::patch('/supplier/{supplier}', 'SupplierController@update')->name('supplier.update');
Route::delete('/supplier/{supplier}', 'SupplierController@destroy')->name('supplier.destroy');

Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/product/{product}', 'ProductController@update')->name('product.update');
Route::delete('/product/{product}', 'ProductController@destroy')->name('product.destroy');

Route::get('/customers', 'CustomerController@index')->name('customers');
Route::post('/customers', 'CustomerController@store')->name('customers.store');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
Route::patch('/customer/{customer}', 'CustomerController@update')->name('customer.update');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('customer.destroy');

// Usuário
Route::get('/profile', 'ProfileController@index')->name('users.profile');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/security', 'SecurityController@index')->name('users.security');
Route::patch('/security/{user}', 'SecurityController@update')->name('security.update');

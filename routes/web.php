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
    return view('home');
});


Route::get('companies/suppliers','CompaniesController@suppliers')->name('companies.suppliers');
Route::get('companies/customers','CompaniesController@customers')->name('companies.customers');

Route::resource('companies','CompaniesController');

Route::resource('companies.agents','AgentsController');

Route::get('about','StaticPagesController@about')->name('about');
Route::get('credits','StaticPagesController@credits')->name('credits');

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('mail/send', 'MailController@send');
Auth::routes();
Route::group(['prefix' => '/'], function () {
// home page
Route::get('','HomeController@index');
//search page
Route::get('search','SearchController@index')->name('search.index');
});

 Route::group(['prefix' => 'plot'], function () {
    Route::get('', 'PlotfrontController@index');
    Route::get('/detail/{id}', 'PlotfrontController@show');

 });

 
 Route::resource('agency', 'front\AgencyController');

 Route::resource('farmland', 'front\FarmlandController');


 Route::group(['prefix' => 'condo'], function () {
    Route::get('', 'front\CondoController@index');
    Route::get('detail/{id}','front\CondoController@show')->name('condo.show');
     
 });
 

 Route::resource('about-us', 'front\About');

 Route::resource('apartment', 'front\ApartmentController');
 
 Route::group(['prefix' => 'house'], function () {
     Route::resource('', 'front\HouseController');
 });




Route::group(['prefix' => 'admin'], function () {
    Route::get('','AdminController@index');

    // UserRoute
    Route::resource('user', 'UserController')->except(['destroy','show']);
    
    Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
    Route::get('user/logout','UserController@logout')->name('user.logout');
    Route::get('users/reset/{id}', 'UserController@reset')->name('user.reset');
    Route::patch('user/reset/save','UserController@reset_save')->name('user.reset_save');
    // bannenr route
    Route::resource('banner', 'Bannercontroller')->except('show');
    Route::get('banner/delete/{id}', 'Bannercontroller@delete')->name('banner.delete');

    //Plot Route
    Route::resource('plot', 'PlotController')->except(['show','destroy']);
    Route::get('plot/delete/{id}','PlotController@delete')->name('plot.delete');
    // Route Apartment
    Route::resource('apartment', 'ApartmentController')->except(['destroy']);
    Route::get('apartment/delete/{id}','ApartmentController@delete')->name('apartment.delete');
    // farmland route
    Route::resource('farmland', 'FarmlandController')->except(['destroy']);
    Route::get('farmland/delete/{id}','FarmlandController@delete')->name('farmland.delete');

    // Home Route
    Route::resource('home', 'HouseController')->except(['destroy']);
    Route::get('home/delete/{id}', 'HouseController@delete')->name('home.delete');


    // condo route
   Route::resource('condo', 'CondoController')->except(['destroy']);
   Route::get('condo/delete/{id}','CondoController@delete')->name('condo.delete');
    // company
    Route::get('company', 'CompanyController@index')->name('company.index');
   Route::get('company/edit/{id}','CompanyController@edit' )->name('company.edit');
   Route::patch('company/update/{id}','CompanyController@update')->name('company.update');


//    Agency Route
    Route::resource('agency', 'AgencyController')->except('destroy');
    Route::get('agency/delete/{id}','AgencyController@delete')->name('agency.delete');
//Loocation
Route::resource('location', 'LocationController')->except(['destroy']);
Route::get('location/delete/{id}', 'LocationController@delete')->name('location.delete');
// Route::post('password/update', 'ResetController@password')->name('password.update');

});



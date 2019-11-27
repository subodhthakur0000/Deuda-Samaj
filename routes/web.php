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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('cd-admin.admin');
});


//About
 Route::get('/abouts','AboutController@index');
 Route::get('/createabout','AboutController@create');
 Route::post('/storeabout','AboutController@store');
 Route::get('/editabout/{slug}','AboutController@edit');
 Route::post('/updateabout/{slug}','AboutController@update');
 Route::post('/updateaboutstatus/{slug}','AboutController@updatestatus');
 Route::DELETE('/deleteabout/{slug}','AboutController@destroy');

//Banner
 Route::get('/banner','BannerController@index');
 Route::get('/createbanner','BannerController@create');
 Route::post('/storebanner','BannerController@store');
 Route::post('/updatebannerstatus/{slug}','BannerController@updatestatus');
 Route::DELETE('/deletebanner/{slug}','BannerController@destroy');

  //Gallery
 Route::get('/galleries','GalleryController@index');
 Route::get('/creategallery','GalleryController@create');
 Route::post('/storegallery','GalleryController@store');
 Route::post('/updategallerystatus/{slug}','GalleryController@updatestatus');
 Route::DELETE('/deletegallery/{slug}','GalleryController@destroy');

 //Contacts
Route::get('/contacts', 'ContactController@index');
Route::get('/addcontact', 'ContactController@insertform');
Route::post('/storecontact', 'ContactController@store');
Route::DELETE('/deletecontact/{id}', 'ContactController@delete');
Route::post('/replystore/{id}', 'ContactController@replystore');
Route::get('/sentmessage', 'ContactController@sentmessage');
Route::get('/replymessage/{id}', 'ContactController@replyform');
Route::DELETE('/deletereply/{id}', 'ContactController@deletereply');

//Dashboard
Route::get('/dashboard','DashboardController@index');
Route::post('/storequickmail','DashboardController@store');
Route::get('/viewquickmail','DashboardController@viewquick');
Route::DELETE('/deletequick/{id}','DashboardController@deletequick');


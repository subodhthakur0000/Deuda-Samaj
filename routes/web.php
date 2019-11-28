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





// Backend

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=> 'auth'] , function(){

Route::get('/logout','HomeController@logout');
Route::get('/viewadmin','HomeController@viewadmin');
Route::get('/addadmin', 'HomeController@addadmin');
Route::post('/storeadmin', 'HomeController@storeadmin');
Route::DELETE('/deleteadmin/{id}', 'HomeController@deleteadmin');

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
 Route::get('/editbanner/{slug}','BannerController@edit');
 Route::post('/updatebanner/{slug}','BannerController@update');
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

//contactdetails
Route::get('/viewcontactdetail', 'ContactdetailController@index');
Route::get('/addcontactdetail', 'ContactdetailController@insertform');
Route::post('/storecontactdetail', 'ContactdetailController@store');
Route::get('/editcontactdetail/{id}', 'ContactdetailController@edit');
Route::post('/updatecontactdetail/{id}', 'ContactdetailController@update');
Route::DELETE('/deletecontactdetail/{id}', 'ContactdetailController@delete');


//Dashboard
Route::get('/dashboard','DashboardController@index');
Route::post('/storequickmail','DashboardController@store');
Route::get('/viewquickmail','DashboardController@viewquick');
Route::DELETE('/deletequick/{id}','DashboardController@deletequick');

// SEO-Section
Route::get('/viewseo','SeoController@index');
Route::get('/addseo','SeoController@insertform');
Route::post('/storeseo','SeoController@store');
Route::get('/editseo/{id}','SeoController@edit');
Route::post('/updateseo/{id}', 'SeoController@update');
Route::DELETE('/deleteseo/{id}','SeoController@delete');


});

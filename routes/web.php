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


// Frontend

Route::get('/','FrontendController@index');
Route::post('/storecontactfront','FrontendController@storecontact');



//Backend

Auth::routes(['register'=>false]);

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
 Route::get('/editabout/{id}','AboutController@edit');
 Route::post('/updateabout/{id}','AboutController@update');
 Route::post('/updateaboutstatus/{id}','AboutController@updatestatus');
 Route::DELETE('/deleteabout/{id}','AboutController@destroy');

//Banner
 Route::get('/banner','BannerController@index');
 Route::get('/createbanner','BannerController@create');
 Route::post('/storebanner','BannerController@store');
 Route::get('/editbanner/{id}','BannerController@edit');
 Route::post('/updatebanner/{id}','BannerController@update');
 Route::post('/updatebannerstatus/{id}','BannerController@updatestatus');
 Route::DELETE('/deletebanner/{id}','BannerController@destroy');

  //Gallery
 Route::get('/galleries','GalleryController@index');
 Route::get('/creategallery','GalleryController@create');
 Route::post('/storegallery','GalleryController@store');
 Route::post('/updategallerystatus/{id}','GalleryController@updatestatus');
 Route::DELETE('/deletegallery/{id}','GalleryController@destroy');

 //Contacts
Route::get('/contacts', 'ContactController@index');
Route::get('/addcontact', 'ContactController@insertform');
Route::post('/storecontact', 'ContactController@store');
Route::DELETE('/deletecontacts/{id}', 'ContactController@delete');
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

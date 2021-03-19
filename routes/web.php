<?php

use Illuminate\Support\Facades\Route;

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

Route::get('registration','Auth\LoginController@registration')->name('registration');
Route::post('post-registration','Auth\LoginController@post_registration')->name('post-registration');

Route::get('login','Auth\LoginController@getlogin')->name('login');

Route::post('post-login','Auth\LoginController@login')->name('post-login');
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::post('/document/convert-word-to-pdf', 'DocumentController@convertWordToPDF')->name('document.convert.wordtopdf');

Route::post('/document/convert-excel-to-pdf', 'DocumentController@convertExcelToPDF')->name('document.exceltopdf');

Route::post('/document/convert-jpg-to-pdf', 'DocumentController@convertJPGToPDF')->name('document.convertJPGToPDF');

Route::get('/document/convert-pdf-to-word', 'DocumentController@convertpdftoword')->name('document.convertPDFToWord')->middleware('is_admin');



Route::get('user-list', 'UserController@user_list')->name('user-list')->middleware('is_admin');


Route::get('test-page', 'UserController@test_page')->name('test-page')->middleware('is_admin');


Route::get('image-to-pdf','DocumentController@imageToPDF')->name('image-to-pdf')->middleware('is_admin');



Route::get('add-user','UserController@add_user')->name('add-user');

Route::post('post-user','UserController@post_user')->name('post-user');
Route::get('user-edit/{id}','UserController@user_edit')->name('user-edit');
Route::post('post-edit','UserController@post_edit')->name('post-edit');

Route::get('user-delete/{id}','UserController@user_delete')->name('user-delete');


Route::post('merge-pdf-to-pdf','DocumentController@merge_pdf_to_pdf')->name('merge-pdf-to-pdf');
Route::post('split-pdf','DocumentController@split_pdf')->name('split-pdf');



Route::get('image-to-pdf','DocumentController@image_to_pdf')->name('image-to-pdf');


Route::post('ppt-to-pdf','DocumentController@ppt_to_pdf')->name('ppt-to-pdf');
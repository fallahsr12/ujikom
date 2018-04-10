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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
	Route::resource('mobil','MobilController');
	Route::resource('supir','SupirController');
	Route::resource('siswa','SiswaController');
	Route::resource('guru','GuruController');
	Route::resource('mapel','MapelController');
	Route::resource('kelas','KelasController');
	Route::resource('ksiswa','KSiswaController');
	Route::resource('kguru','KGuruController');
	Route::resource('siswa_terlambat','TerlambatController');
	Route::get('/pdf', 'PdfController@pdf');
	Route::get('pdfview',array('as'=>'pdfview','uses'=>'PdfController@pdfview'));
});

	Route::get('/kguru/pdf',[
    'uses'  =>'KGuruController@getPdf',
    'as'    =>'kguru/pdf',
]);

	Route::get('/ksiswa/pdf',[
    'uses'  =>'KSiswaController@getPdf',
    'as'    =>'ksiswa/pdf',
]);

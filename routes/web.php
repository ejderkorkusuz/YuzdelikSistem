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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/admin','admin\HomeController@index');
//KULLANICI İŞLEMLERİ
Route::get('/admin/kullanicilar','admin\UserController@uyeler');
Route::get('/admin/kullanici/edit/{id}','admin\UserController@uye_duzenle');
Route::get('/admin/kullanici/delete/{id}','admin\UserController@uye_sil');
Route::get('/admin/kullanici/show/{id}','admin\UserController@uye_detay');
Route::get('/admin/kullanici/save','admin\UserController@uye_olustur_form');
Route::post('/admin/kullanici/newuser','admin\UserController@uye_olustur_vt');
Route::post('/admin/kullanici/upadate/{id}','admin\UserController@uye_guncelle');

//MÜŞTERİ İŞLEMLERİ

Route::get('/admin/musteriler','admin\MusteriController@musteriler');
Route::get('/admin/musteri/newclient','admin\MusteriController@musteri_olustur_form');
Route::post('/admin/musteri/save','admin\MusteriController@musteri_olustur_vt');

//İŞ İŞLEMLERİ

Route::get('/admin/isler','admin\IsController@isler');
Route::get('/admin/isler/newbusiness','admin\IsController@is_olustur_form');
//Route::get('/admin/isler/newbusiness','admin\IsController@is_olustur_form');
Route::post('/admin/isler/save','admin\IsController@is_olustur_vt');

Route::get('/admin/isler/uploadagreement/{id}','admin\IsController@sozlesme_yukle_form');
Route::post('/admin/isler/saveagreement/{isId}','admin\IsController@sozlesme_yukle_vt');

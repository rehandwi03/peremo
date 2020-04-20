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



Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/merek_mobil', 'MobilController@merek_mobil')->name('mobil.merek_mobil');
    Route::post('/merek_mobil', 'MobilController@store_merek')->name('mobil.merek_mobil.store');
    Route::delete('/merek_mobil', 'MobilController@destroy_merek')->name('mobil.merek_mobil.destroy');
    Route::resource('/mobil', 'MobilController');
    Route::resource('/pelanggan', 'PelangganController');
    Route::resource('/penyewaan', 'PenyewaanController');
    Route::resource('/harga_sewa', 'HargaSewaController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/harga_sewa/mobil/{id}', 'HargaSewaController@fetch');
    Route::get('/harga_sewa/unit/{id}', 'HargaSewaController@get_unit');
    Route::post('/penyewaan/sewa', 'PenyewaanController@sewakan')->name('penyewaan.sewa');
    Route::post('/penyewaan/kembalikan', 'PenyewaanController@kembalikan')->name('penyewaan.kembalikan');
    Route::post('/penyewaan/batalkan', 'PenyewaanController@batalkan')->name('penyewaan.batalkan');
    Route::get('/penyewaan/invoice/{id}', 'PenyewaanController@invoice')->name('penyewaan.invoice');
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('/role', 'RoleController');
        Route::resource('/user', 'UserController');
        Route::resource('/karyawan', 'KaryawanController')->except(['update']);
        Route::post('/karyawan/update', 'KaryawanController@update')->name('karyawan.update');
        Route::get('/laporan', 'LaporanController@index')->name('penyewaan.laporan');
        Route::post('/laporan', 'LaporanController@show')->name('penyewaan.laporan.show');
    });
});

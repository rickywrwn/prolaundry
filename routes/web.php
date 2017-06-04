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


Route::get('/homepage', 'home@index');
Route::get('/homepage/selesai/{id}', 'home@transSelesai');

Route::get('/masuk', 'loginController@index');
Route::post('/masuk', 'loginController@login');
Route::get('/logout', 'loginController@logout');

//admin
Route::group(['prefix' => 'admin'], function(){

  Route::get('/user', 'userController@index');
  //untuk insert kantor
  Route::post('/user', 'userController@insertUser');
  //untuk update kantor
  Route::get('/editUser/{id}', 'userController@editUser'); //form update
  Route::put('/{id}', 'userController@updateUser');//update database

});

//kantor
Route::group(['prefix' => 'kantor'], function(){

  Route::get('/', 'kantorController@index');
  //untuk insert kantor
  Route::post('/', 'kantorController@insertKantor');
  //untuk update kantor
  Route::get('/editKantor/{id}', 'kantorController@editKantor'); //form update
  Route::put('/{id}', 'kantorController@updateKantor');//update database
  //untuk delete kantor
  Route::get('/deleteKantor/{id}', 'kantorController@deleteKantor');

});

//jasa
Route::group(['prefix' => 'jasa'], function()
{
  Route::get('/', 'jasaController@index');
  //insertJasa
  Route::post('/', 'jasaController@insertJasa');
  //update jasa
  Route::get('/editJasa/{id}', 'jasaController@editJasa');
  Route::put('/{id}','jasaController@updateJasa');
  //delete kantor
  Route::get('/deleteJasa/{id}','jasaController@deleteJasa');
});

//barang
Route::group(['prefix' => 'barang'], function()
  {
    Route::get('/','barangController@index');
    //insert barang
    Route::post('/','barangController@insertBarang');
    //update barang
    Route::get('/editBarang/{id}','barangController@editBarang');
    Route::put('/{id}','barangController@updateBarang');
    //delete barang
    Route::get('/deleteBarang/{id}','barangController@deleteBarang');
  });

//customer
Route::group(['prefix' => 'customer'], function()
  {
    Route::get('/','customerController@index');
    //insert customer
    Route::post('/','customerController@insertCustomer');
    //update customer
    Route::get('/editCustomer/{id}','customerController@editCustomer');
    Route::put('/{id}','customerController@updateCustomer');
    //delete customer
    Route::get('/deleteCustomer/{id}','customerController@deleteCustomer');
  });


//supplier
Route::group(['prefix' => 'supplier'], function()
  {
    Route::get('/','supplierController@index');
    //insert supplier
    Route::post('/','supplierController@insertSupplier');
    //update supplier
    Route::get('/editSupplier/{id}','supplierController@editSupplier');
    Route::put('/{id}','supplierController@updateSupplier');
    //delete supplier
    Route::get('/deleteSupplier/{id}','supplierController@deleteSupplier');
  });

//pegawai
Route::group(['prefix' => 'pegawai'], function()
  {
    Route::get('/','pegawaiController@index');
    //insert supplier
    Route::post('/','pegawaiController@insertPegawai');
    //update supplier
    Route::get('/editPegawai/{id}','pegawaiController@editPegawai');
    Route::put('/{id}','pegawaiController@updatePegawai');
    //delete supplier
    Route::get('/deletePegawai/{id}','pegawaiController@deletePegawai');
  });

//gudang
Route::group(['prefix' => 'pegawai'], function()
  {
    Route::get('/','pegawaiController@index');
    //insert supplier
    Route::post('/','pegawaiController@insertPegawai');
    //update supplier
    Route::get('/editPegawai/{id}','pegawaiController@editPegawai');
    Route::put('/{id}','pegawaiController@updatePegawai');
    //delete supplier
    Route::get('/deletePegawai/{id}','pegawaiController@deletePegawai');
  });


//gudang
Route::group(['prefix' => 'gudang'], function()
  {
    Route::get('/{jenis}','gudangController@index');
  });

//trans
Route::group(['prefix' => 'transaksi'], function()
  {
    //beli
    Route::get('/pembelian','beliController@index');
    Route::post('/pembelian','beliController@insertPembelian');
    Route::get('/showPembelian/{id}','beliController@showPembelian');
    Route::post('/backPembelian','beliController@back');

    //jual
    Route::get('/penjualan','jualController@index');
    Route::post('/penjualan','jualController@insertPenjualan');
    Route::get('/showPenjualan/{id}','jualController@showPenjualan');
    Route::post('/backPenjualan','jualController@back');

    //retur
    Route::get('/retur','returController@index');

    //pemakaian
    Route::get('/pemakaian','pemakaianController@index');
    Route::post('/pemakaian','pemakaianController@insertPemakaian');
    Route::get('/showPemakaian/{id}','pemakaianController@showPemakaian');
    Route::post('/backPemakaian','pemakaianController@back');

  });

  //nota
  Route::get('/notaPenjualan/{id}','jualController@nota');


  //laporan
  Route::group(['prefix' => 'laporan'], function()
    {
      //beli
      Route::get('/pembelian','laporanController@pembelian');
      Route::post('/pembelian','laporanController@showLaporanPembelian');

      //jual
      Route::get('/penjualan','laporanController@penjualan');
      Route::post('/penjualan','laporanController@showLaporanPenjualan');

      //pemakaian
      Route::get('/pemakaian','laporanController@pemakaian');
      Route::post('/pemakaian','laporanController@showLaporanPemakaian');

      //jurnal
      Route::get('/jurnal','laporanController@jurnal');
      Route::post('/jurnal','laporanController@showJurnal');

    });

Route::get('/home', 'HomeController@index');

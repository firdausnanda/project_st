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
    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'superadmin'], function () {
    
// admin dashboard
Route::get('/admin', 'HomeController@index')->name('admin');

//myprofile management
Route::get('/profile', 'ProfilController@index');
Route::post('/profile/store','ProfilController@store');


// Dosen Management
Route::get('/dosen', 'DosenController@index')->name('dosen');
Route::post('/dosen/store','DosenController@store');
Route::post('/dosen/update','DosenController@update');
Route::get('/dosen/hapus/{id}','DosenController@hapus');

// Matkul Management
Route::get('/matkul', 'MatkulController@index')->name('matkul');
Route::post('/matkul/store','MatkulController@store');
Route::post('/matkul/update','MatkulController@update');
Route::get('/matkul/hapus/{id}','MatkulController@hapus');

//TA Management
Route::get('/ta', 'TaController@index')->name('ta');
Route::post('/ta/store','TaController@store');
Route::post('/ta/update','TaController@update');
Route::get('/ta/hapus/{id}','TaController@hapus');

//Prodi Management
Route::get('/prodii', 'ProdiController@index')->name('prodi');
Route::post('/prodii/store','ProdiController@store');
Route::post('/prodii/update','ProdiController@update');
Route::get('/prodii/hapus/{id}','ProdiController@hapus');

// Akun Management
Route::get('/akun', 'AkunController@index')->name('akun');
Route::post('/akun/store','AkunController@store');
Route::post('/akun/update','AkunController@update');
Route::get('/akun/hapus/{id}','AkunController@hapus');

//SGAS Management
Route::get('/sgas', 'SgasController@index')->name('sgas');
Route::get('/sgas/{id}', 'SgasController@loadData')->name('getDetails');
Route::post('/sgas/store','SgasController@store');
//Route::post('/sgas/update','SgasController@update');
Route::get('/sgas/hapus/{id}','SgasController@hapus');
Route::POST('/sgas/cari','SgasController@cari');

//SGAS Detail Management
Route::get('/sgas/detail/{id}', 'DetailsgasController@index')->name('detail');

Route::post('/sgas/detail/store','DetailsgasController@store');
Route::post('/sgas/detail/storepembimbing','DetailsgasController@storepembimbing');
Route::post('/sgas/detail/storepenunjang','DetailsgasController@storepenunjang');

Route::get('/detail/hapus/{id}','DetailsgasController@hapus');
Route::get('/detail/pembimbing/{id}','DetailsgasController@hapuspembimbing');
Route::get('/detail/penunjang/{id}','DetailsgasController@hapuspenunjang');

Route::get('/detail/validasi/{validasi}','DetailsgasController@validasi')->name('validasi');

Route::get('/detail/idmatkul/{id}', 'DetailsgasController@loadDataKode')->name('getDetailKodeMatkul');
Route::get('/detail/namamatkul/{id}', 'DetailsgasController@loadDataNama')->name('getDetailNamaMatkul');

Route::get('/print/{id}', 'DetailsgasController@generateInvoice')->name('invoice');

// Tracking Management
Route::get('/tracking', 'TrackingController@index')->name('tracking');
Route::post('/tracking/store','TrackingController@store');
Route::post('/tracking/update','TrackingController@update');
Route::get('/tracking/hapus/{id}','TrackingController@hapus');

});

// ----------------------------------------------------- // ADMIN/PRODI \\ ---------------------------------- \\

Route::group(['middleware' => 'admin'], function () {

//admin dashboard
Route::get('/prodi', 'HomeController@indexadmin');

//myprofile management
Route::get('/profileadmin', 'ProfilController@indexadmin');
Route::post('/profileadmin/store','ProfilController@store');

//inputdata Management
Route::get('/inputdata', 'SgasController@indexadmin');
Route::post('/inputdata/store','SgasController@storeAdmin');
Route::get('/inputdata/{id}', 'SgasController@loadDataNama')->name('getNama');
Route::get('/inputdata/hapus/{id}','SgasController@hapus');


//detail Management
Route::get('/inputdata/detail/{id}', 'DetailsgasController@indexadmin');
Route::post('/inputdata/detail/store','DetailsgasController@storeadmin');
Route::get('/inputdata/detail/hapus/{id}','DetailsgasController@hapusadmin');
Route::get('/inputdata/idmatkul/{id}', 'DetailsgasController@loadDataKode')->name('getDataKodeMatkul');
Route::get('/inputdata/namamatkul/{id}', 'DetailsgasController@loadDataNama')->name('getDataNamaMatkul');



   
});



// ----------------------------------------------------- // USER \\ ---------------------------------- \\


Route::group(['middleware' => 'user'], function () {

// user dashboard
Route::get('/user', 'HomeController@indexuser')->name('user');

//myprofile management
Route::get('/profileuser', 'ProfilController@indexuser');
Route::post('/profileuser/store','ProfilController@store');

// user cetak data
Route::get('/cetak', 'SgasController@indexuser');
Route::get('/cetak/detail/{id}', 'DetailsgasController@indexuser');
Route::get('/cetak/print/{id}', 'DetailsgasController@generateInvoiceUser')->name('invoiceUser');

});


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
Route::post('/sgas/detail/storepenelitian','DetailsgasController@storepenelitian');
Route::post('/sgas/detail/storepengabdian','DetailsgasController@storepengabdian');


Route::get('/detail/hapus/{id}','DetailsgasController@hapus');
Route::get('/detail/pembimbing/{id}','DetailsgasController@hapuspembimbing');
Route::get('/detail/penunjang/{id}','DetailsgasController@hapuspenunjang');
Route::get('/detail/penelitian/{id}','DetailsgasController@hapuspenelitian');
Route::get('/detail/pengabdian/{id}','DetailsgasController@hapuspengabdian');

Route::get('/detail/validasi/{validasi}','DetailsgasController@validasi')->name('validasi');

Route::get('/detail/idmatkul/{id}', 'DetailsgasController@loadDataKode')->name('getDetailKodeMatkul');
Route::get('/detail/namamatkul/{id}', 'DetailsgasController@loadDataNama')->name('getDetailNamaMatkul');

Route::get('/print/{id}', 'DetailsgasController@generateInvoice')->name('invoice');
Route::get('/printno/{id}', 'DetailsgasController@generateInvoice2')->name('invoice2');

// Tracking Management
Route::get('/tracking', 'TrackingController@index')->name('tracking');
Route::post('/tracking/store','TrackingController@store');
Route::post('/tracking/update','TrackingController@update');
Route::get('/tracking/hapus/{id}','TrackingController@hapus');

//Report
Route::get('/report/rekap-matkul', 'RekapMatkulController@index')->name('rekap-matkul');
Route::get('/report/rekap-matkul/print', 'RekapMatkulController@print')->name('printmatkul');

Route::get('/report/rekap-dosen', 'RekapDosenController@index')->name('rekap-dosen');
Route::get('/report/rekap-dosen/print', 'RekapDosenController@print')->name('printdosen');

Route::get('/report/rekap-pembimbingan', 'RekapPembimbinganController@index')->name('rekap-pembimbingan');
Route::get('/report/rekap-pembimbingan/print', 'RekapPembimbinganController@print')->name('printpembimbingan');

Route::get('/report/rekap-penunjang', 'RekapPenujangController@index')->name('rekap-penunjang');
Route::get('/report/rekap-penunjang/print', 'RekapPenujangController@print')->name('printpenunjang');

Route::get('/report/dosen-total', 'RekapDosenTotalController@index')->name('rekap-dosen-total');
Route::get('/report/dosen-total/print', 'RekapDosenTotalController@print')->name('printdosentotal');

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
Route::post('/inputdata/detail/storepembimbing','DetailsgasController@storepembimbingadmin');
Route::post('/inputdata/detail/storepenunjang','DetailsgasController@storepenunjangadmin');
Route::post('/inputdata/detail/storepenelitian','DetailsgasController@storepenelitianadmin');
Route::post('/inputdata/detail/storepengabdian','DetailsgasController@storepengabdianadmin');


Route::get('/inputdata/detail/hapus/{id}','DetailsgasController@hapusadmin');
Route::get('/inputdata/pembimbing/{id}','DetailsgasController@hapuspembimbingadmin');
Route::get('/inputdata/penunjang/{id}','DetailsgasController@hapuspenunjangadmin');
Route::get('/inputdata/penelitian/{id}','DetailsgasController@hapuspenelitianadmin');
Route::get('/inputdata/pengabdian/{id}','DetailsgasController@hapuspengabdianadmin');


Route::get('/inputdata/idmatkul/{id}', 'DetailsgasController@loadDataKode')->name('getDataKodeMatkul');
Route::get('/inputdata/namamatkul/{id}', 'DetailsgasController@loadDataNama')->name('getDataNamaMatkul');

Route::get('/inputdata/print/{id}', 'DetailsgasController@generateInvoice')->name('invoiceadmin');
Route::get('/inputdata/printno/{id}', 'DetailsgasController@generateInvoice2')->name('invoiceadmin2');

//Report
Route::get('/prodi/rekap-matkul', 'RekapMatkulController@index');
Route::get('/prodi/rekap-matkul/print', 'RekapMatkulController@print')->name('printmatkuladmin');

Route::get('/prodi/report/rekap-dosen', 'RekapDosenController@index');
Route::get('/prodi/report/rekap-dosen/print', 'RekapDosenController@print')->name('printdosenadmin');

Route::get('/prodi/report/rekap-pembimbingan', 'RekapPembimbinganController@index');
Route::get('/prodi/report/rekap-pembimbingan/print', 'RekapPembimbinganController@print')->name('printpembimbinganadmin');

Route::get('/prodi/report/rekap-penunjang', 'RekapPenujangController@index');
Route::get('/prodi/report/rekap-penunjang/print', 'RekapPenujangController@print')->name('printpenunjangadmin');

Route::get('/prodi/report/dosen-total', 'RekapDosenTotalController@index');
Route::get('/prodi/report/dosen-total/print', 'RekapDosenTotalController@print')->name('printdosentotaladmin');
   
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

Route::get('/cetak/print/{id}', 'DetailsgasController@generateInvoice')->name('invoiceuser');
Route::get('/cetak/printno/{id}', 'DetailsgasController@generateInvoice2')->name('invoiceuser2');

});


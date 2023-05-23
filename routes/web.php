<?php
use App\Product;
use Illuminate\Http\Request;
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


//--------------------------FORM INPUT SPK DEPRESS-----------------------//

//---SPK INPUT CONTROLLER
Route::post('/admin/input_spk_rincian','AdminProduksiSPKInputController@input_spk_rincian')->name('input_spk_rincian');
Route::get('/admin/delete_rincian/{id}','AdminProduksiSPKInputController@delete_rincian');
Route::get('/admin/delete_proses_produksi/{id}','AdminProduksiSPKInputController@delete_proses_produksi');
Route::get('/admin/add_dimensi','AdminProduksiSPKInputController@add_dimensi')->name('add_dimensi');
Route::get('/admin/goto_rincian','AdminProduksiSPKInputController@goto_rincian')->name('goto_rincian');
//-----------------
Route::post('/admin/input_rincian','AdminProduksiSPKInputController@input_rincian')->name('input_rincian');
Route::post('/admin/input_rincian_detail','AdminProduksiSPKInputController@input_rincian_detail')->name('input_rincian_detail');
Route::get('/admin/add_detail_to_rincian','AdminProduksiSPKInputController@add_detail_to_rincian');
Route::get('/admin/button_back_rincian','AdminProduksiSPKInputController@button_back_rincian');
Route::get('/admin/save_all','AdminProduksiSPKInputController@save_all');
Route::get('/admin/goto_pdf','AdminProduksiSPKInputController@goto_pdf');


//---SPK PRODUKSI VIEW CONTROLLER
Route::get('/admin/update_status_to_proses/{id}','AdminProduksiSPKViewController@update_status_to_proses');
Route::get('/admin/update_status_to_selesai/{id}','AdminProduksiSPKViewController@update_status_to_selesai');
Route::get('/admin/delete_spk/{id}','AdminProduksiSPKViewController@delete_spk');
Route::get('/admin/print_spk/{id}','AdminProduksiSPKViewController@print_spk');

//-----------------
Route::get('/admin/goto_edit/{id}','AdminProduksiSPKViewController@goto_edit');
Route::get('/admin/edit_spk','AdminProduksiSPKViewController@edit_spk')->name('edit_spk');
Route::get('/admin/edit_rincian','AdminProduksiSPKViewController@edit_rincian')->name('edit_rincian');
Route::get('/admin/edit_detail','AdminProduksiSPKViewController@edit_detail')->name('edit_detail');
Route::get('/admin/edit_keterangan','AdminProduksiSPKViewController@edit_keterangan')->name('edit_keterangan');

//---SPK PRODUKSI MONITORING CONTROLLER
Route::get('/admin/goto_detail/{id}','AdminProduksiSPKMonitoringController@goto_detail');

//---SPK PRODUKSI TAPING CONTROLLER
Route::get('/admin/proses_update/{id}','AdminProduksiSPKTapingController@proses_update');
Route::post('/admin/input_proses_produksi','AdminProduksiSPKTapingController@input_proses_produksi')->name('input_proses_produksi');
Route::get('/admin/proses_done/{id}','AdminProduksiSPKTapingController@proses_done');
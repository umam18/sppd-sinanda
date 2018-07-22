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

Route::group(['middleware' => 'web'], function()
{
	Route::auth();
});

Route::group(['middleware' => ['web','auth']], function()
{
	Route::get('/', function ()
	{
		if (Auth::user()->role == 1){
			return view('admin/dashboard');
		} else{
			return view('pegawai/dashboard');
		}
	});
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::get('role', ['middleware' => ['web','auth','role'], function()
{
	return view('admin/dashboard');
}]);

Route::get('/logout', function()
{
	Sessin::flush();
	Auth::logout();
	return Redirect::to("/");
});

Route::middleware('auth')->group(function()
{
		Route::get('admin/dashboard', 'DashboardController@admin')->name('admin.dashboard');
		Route::post('petugas/dashboard', 'DashboardController@pegawai')->name('petugasdashboard');

		Route::post('admin/user-management/search', 'UserManagementController@search')->name('user-management.search');
		Route::resource('admin/user-management', 'UserManagementController');

		Route::post('admin/permenkeu/search', 'PermenkeuController@search')->name('permenkeu.search');
		Route::resource('admin/permenkeu', 'PermenkeuController');

		Route::post('admin/jabatan/search', 'JabatanController@search')->name('jabatan.search');
		Route::resource('admin/jabatan', 'JabatanController');

		Route::post('admin/pembebanan/search', 'PembebananController@search')->name('pembebanan.search');
		Route::resource('admin/pembebanan', 'PembebananController');

		//Admin Report
		Route::get('admin/report', 'ReportController@index')->name('admin.report');
		Route::post('admin/report/search', 'ReportController@search')->name('report.search');
		Route::post('admin/report/excel', 'ReportController@exportExcel')->name('report.excel');
		Route::post('admin/report/excel_Nurul', 'ReportController@exportExcel2')->name('report.excel2');
		Route::post('admin/report/excel_Maryadi', 'ReportController@exportExcel3')->name('report.excel3');

		Route::get('admin/data-pegawai', 'PegawaiController@index')->name('admin/data-pegawai');
		Route::resource('admin/data-pegawai', 'PegawaiController');
		Route::post('admin/data-pegawai/search', 'PegawaiController@search')->name('admin.search');

		//Admin validasi SPD
		Route::get('admin/validasi/belum', 'V_SpdController@belum')->name('b_validasi.spd');
		Route::get('admin/validasi/sudah', 'V_SpdController@sudah')->name('s_validasi.spd');
		Route::get('admin/validasi/belum/edit_spd/{id}', 'V_SpdController@edit_spd')->name('spd.edit');
		Route::post('admin/validasi/belum/update_spd/{id}', 'V_SpdController@update_spd')->name('spd.update');
		Route::post('admin/validasi/belum/search', 'V_SpdController@search')->name('validasi.search');
		Route::post('admin/validasi/sudah/search', 'V_SpdController@search2')->name('validasi.search2');
		Route::resource('admin/validasi', 'V_SpdController');

		//Admin Validasi Event
		Route::get('admin/validasi/event/belum/pilih', 'V_EventController@lihat_belum')->name('lihat_belum.event');
		Route::get('admin/validasi/event/sudah/pilih', 'V_EventController@lihat_sudah')->name('lihat_sudah.event');
		Route::get('admin/validasi/event/belum/{id}', 'V_EventController@belum')->name('belum_validasi.event');
		Route::get('admin/validasi/event/sudah/{id}', 'V_EventController@sudah')->name('sudah_validasi.event');
		Route::get('admin/validasi/event/belum/edit_event/{id}', 'V_EventController@edit_espd')->name('espd.edit');
		Route::post('admin/validasi/event/belum/update_espd/{id}', 'V_EventController@update_espd')->name('espd.update');
		Route::post('admin/validasi/event/belum/update_event/{id}', 'V_EventController@update_event')->name('event-event.update');
		Route::post('admin/validasi/event/export/{id}', 'V_EventController@exportExcel')->name('espd.nominatif');
		Route::post('admin/validasi/event/belum/search', 'V_EventController@search')->name('v_event.search');
		Route::post('admin/validasi/event/sudah/search', 'V_EventController@search2')->name('v_event.search2');
		Route::post('admin/validasi/event/sudah/delete/{id}', 'V_EventController@delete')->name('event.delete');
		Route::resource('admin/eventpengikut', 'V_EventController');

		//Admin Input SPD
		Route::get('admin/input-data', 'AInputController@index')->name('admin/input-data');
		Route::resource('admin/input-data', 'AInputController');
		Route::post('admin/input-data/search', 'AInputController@search')->name('input-data.search');

		//Admin Input Event
		Route::get('admin/event', 'AEInputController@index')->name('admin/event');
		Route::resource('admin/event', 'AEInputController');

		//Admin Input Pengikut Event
		Route::get('admin/event/pengikut', 'AEPController@index')->name('admin/pengikut');
		Route::resource('admin/event/pengikut', 'AEPController');

		//Admin Input Pengikut Event Tambah
		Route::get('admin/event/pengikut/tambah', 'AEP2Controller@index')->name('admin/tambah');
		Route::resource('admin/event/pengikut/tambah', 'AEP2Controller');

		//Admin Input Pengikut Finish
		Route::get('admin/event/pengikut/finish', 'AEPFController@index')->name('admin/finish');
		Route::resource('admin/event/pengikut/finish', 'AEPFController');

});

		//AJAX CONTROLLER
		Route::get('admin/get-nip', 'AjaxController@getNIP');
		Route::get('admin/get-jabatan', 'AjaxController@getJabatan');
		Route::get('admin/get-pangkat', 'AjaxController@getPangkat');
		Route::get('admin/get-tingkat', 'AjaxController@getTingkat');
		Route::get('admin/get-hn', 'AjaxController@getHN');
		Route::get('admin/get-tku', 'AjaxController@getTKU');
		Route::get('admin/get-fd', 'AjaxController@getFD');
		Route::get('admin/get-fb', 'AjaxController@getFB');
		Route::get('admin/get-diklat', 'AjaxController@getDiklat');
		Route::get('admin/get-tujuan', 'AjaxController@getTujuan');
		Route::get('admin/get-penginapan', 'AjaxController@getPenginapan');

Route::middleware('auth')->group(function()
{
		Route::get('petugas/dashboard', 'DashboardController@pegawai')->name('pegawai/dashboard');

		//PEGAWAI INPUT SPD
		Route::get('petugas/input/spd', 'InputController@index')->name('pegawai/input');
		Route::resource('petugas/input', 'InputController');

		//PEGAWAI INPUT EVENT
		Route::get('petugas/input/event', 'InputEventController@index')->name('pegawai/inputevent');
		Route::resource('petugas/inputevent', 'InputEventController');

		//PEGAWAI Input Pengikut Event
		Route::get('petugas/event/pengikut', 'EPController@index')->name('pegawai/add-pengikut');
		Route::resource('petugas/event/add-pengikut', 'EPController');

		//PEGAWAI Input Pengikut Event Tambah
		Route::get('petugas/event/pengikut/tambah', 'EP2Controller@index')->name('pegawai/tambah');
		Route::resource('petugas/event/pengikut/pengikut2', 'EP2Controller');

		//Pegawai Input Pengikut Finish
		Route::get('petugas/event/pengikut/final', 'EPFController@index')->name('pegawai/final');
		Route::resource('petugas/event/pengikut/final', 'EPFController');

		//PEGAWAI CETAK SPD
		Route::get('petugas/cetak', 'CetakController@index')->name('pegawai/cetak');
		Route::resource('petugas/cetak', 'CetakController');
		Route::post('petugas/cetak/search', 'CetakController@search')->name('cetak.search');
		Route::post('petugas/cetak/export', 'CetakController@exportPDF')->name('cetak.spd');
		Route::post('petugas/cetak/export2', 'CetakController@exportPDFrbiaya')->name('cetak.rbiaya');

		Route::get('petugas/pegawai', 'PetugasController@index')->name('pegawai/pegawai');
		Route::resource('petugas/pegawai', 'PetugasController');
		Route::post('petugas/pegawai/search', 'PetugasController@search')->name('pegawai.search');

		//PEGAWAI CETAK EVENT
		Route::get('petugas/cetak/event', 'CetakEventController@index')->name('pegawai/cetakevent');
		Route::resource('petugas/cetakevent', 'CetakEventController');
		Route::post('petugas/cetak/event/search', 'CetakEventController@search')->name('cetakevent.search');
		Route::post('petugas/cetak/event/sudah/search', 'CetakEventController@search2')->name('cetaksudah.search');
		Route::post('petugas/cetak/event/export', 'CetakEventController@exportPDF')->name('cetak.eventspd');
		Route::post('petugas/cetak/event/export2', 'CetakEventController@exportPDFrbiaya')->name('cetak.eventrbiaya');
		Route::get('petugas/cetakevent/{$id}', 'CetakEventController@show')->name('lihat_cetak.events');
		Route::post('petugas/cetak/event/export/{$id}', 'CetakEventController@exportExcel')->name('cetak.nominatif');
		Route::post('petugas/cetak/event/export2', 'CetakEventController@exportPDFrbiaya')->name('cetak.event');

		//Pegawai validasi SPD
		Route::get('petugas/data/individu', 'VP_SpdController@belum')->name('b-spd_validasi.spd');
		Route::get('petugas/validasi/sudah', 'VP_SpdController@sudah')->name('s-spd_validasi.spd');
		Route::get('petugas/validasi/belum/edit_spd/{id}', 'VP_SpdController@edit_spd')->name('spd-spd.edit');
		Route::post('petugas/validasi/belum/update_spd/{id}', 'VP_SpdController@update_spd')->name('spd-spd.update');
		Route::post('petugas/validasi/belum/search', 'VP_SpdController@search')->name('validasi-spd.search');
		Route::post('petugas/validasi/sudah/search', 'VP_SpdController@search2')->name('validasi-spd.search2');
		Route::resource('petugas/validasi-spd', 'VP_SpdController');

		//petugas Validasi Event
		Route::get('petugas/data/event', 'VP_EventController@lihat_belum')->name('lihat-event_belum.event');
		Route::get('petugas/validasi/event/sudah/pilih', 'VP_EventController@lihat_sudah')->name('lihat-event_sudah.event');
		Route::get('petugas/validasi/event/belum/{id}', 'VP_EventController@belum')->name('belum-event_validasi.event');
		Route::get('petugas/validasi/event/sudah/{id}', 'VP_EventController@sudah')->name('sudah-event_validasi.event');
		Route::get('petugas/validasi/event/belum/edit_event/{id}', 'VP_EventController@edit_espd')->name('espd-event.edit');
		Route::post('petugas/validasi/event/belum/update_espd/{id}', 'VP_EventController@update_espd')->name('espd-event.update');
		Route::post('petugas/validasi/event/export/{id}', 'VP_EventController@exportExcel')->name('espd-event.nominatif');
		Route::post('petugas/validasi/event/belum/search', 'VP_EventController@search')->name('v-event_event.search');
		Route::post('petugas/validasi/event/sudah/search', 'VP_EventController@search2')->name('v-event_event.search2');
		Route::resource('petugas/validasi-event', 'VP_EventController');

});

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
	    return view('welcome');
	});
	
	/**
	 * This from original Router Laravel
	 */
	// Auth::routes();


	/**
	 * Login Router
	 */
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login')->name('login.submit');

	/**
	 * Logout Route
	 */
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

	/**
	 * Registration Routes
	 */
	$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	$this->post('register', 'Auth\RegisterController@register');

	/**
	 * Password Reset Routes
	 */
	$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
	$this->post('password/reset', 'Auth\ResetPasswordController@reset');

	/**
	 * Router For HomeController
	 */
	Route::get('/home', 'HomeController@index')->name('home');


	Route::get('api/meal', 'MealController@apiMeal')->name('api.meal');
	Route::get('meal/addcheck', 'MealController@addcheck')->name('api.mealaddcheck');
	Route::resource('meal', 'MealController');

	Route::get('api/dosen', 'DosenController@apiDosen')->name('api.dosen');
	Route::get('dosen/addcheck', 'DosenController@addcheck')->name('api.dosenaddcheck');
	Route::resource('dosen', 'DosenController');
	//Route::post('dosen/{id}/update', 'DosenController@update')->where('id', '')->name('update.dosen');
	Route::get('api/pangkat', 'PangkatController@apiPangkat')->name('api.pangkat');
	Route::get('pangkat/addcheck', 'PangkatController@addcheck')->name('api.pangkataddcheck');
	Route::resource('pangkat', 'PangkatController');

	Route::get('api/golongan', 'GolonganController@apiGolongan')->name('api.golongan');
	Route::get('golongan/addcheck', 'GolonganController@addcheck')->name('api.golonganaddcheck');
	Route::resource('golongan', 'GolonganController');

	Route::get('api/kelas', 'KelasController@apiKelas')->name('api.kelas');
	Route::get('kelas/addcheck', 'KelasController@addcheck')->name('api.kelasaddcheck');
	Route::resource('kelas', 'KelasController');

	Route::get('api/mk', 'MkController@apiMk')->name('api.mk');
	Route::get('mk/addcheck', 'MkController@addcheck')->name('api.mkaddcheck');
	Route::resource('mk', 'MkController');

	Route::get('api/pajak', 'PajakController@apiPajak')->name('api.pajak');
	Route::get('pajak/addcheck', 'PajakController@addcheck')->name('api.pajakaddcheck');
	Route::resource('pajak', 'PajakController');

	Route::get('api/honor', 'HonorController@apiHonor')->name('api.honor');
	Route::get('honor/addcheck', 'HonorController@addcheck')->name('api.honoraddcheck');
	Route::resource('honor', 'HonorController');

	Route::get('api/mengajar', 'MengajarController@apiMengajar')->name('api.mengajar');
	Route::get('mengajar/addcheck', 'MengajarController@addcheck')->name('api.mengajaraddcheck');
	Route::resource('mengajar', 'MengajarController');

	Route::get('api/absensi', 'AbsensiController@apiAbsensi')->name('api.absensi');
	Route::resource('absensi', 'AbsensiController');

	Route::get('api/jurusan', 'JurusanController@apiJurusan')->name('api.jurusan');
	Route::resource('jurusan', 'JurusanController');


	Route::get('api/penggajian', 'PenggajianController@apiPenggajian')->name('api.penggajian');
	Route::resource('penggajian', 'PenggajianController');

Route::get('api/laporan', 'LaporanController@apiPenggajian')->name('api.laporan');
	Route::resource('laporan', 'LaporanController');

	Route::get('exportsemua', 'LaporanController@penggajianExport')->name('laporan.export');

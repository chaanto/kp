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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
  Route::resource('jurnals', 'App\Http\Controllers\Admin\JurnalController');
  Route::get('jurnal-list', 'App\Http\Controllers\Admin\JurnalController@jurnalDataTable')->name('jurnal-list');

  Route::resource('akuns', 'App\Http\Controllers\Admin\AkunController');
  Route::get('akun-list', 'App\Http\Controllers\Admin\AkunController@akunDataTable')->name('akun-list');
  Route::get('akun-select', 'App\Http\Controllers\Admin\AkunController@akunSelect')->name('akun-select');

  Route::get('laba-rugi', 'App\Http\Controllers\Admin\LabaRugiController@index')->name('laba-rugi.index');
  Route::post('laba-rugi', 'App\Http\Controllers\Admin\LabaRugiController@print')->name('laba-rugi.print');

  Route::get('perubahan-modal', 'App\Http\Controllers\Admin\CapitalController@index')->name('perubahan-modal.index');
  Route::post('perubahan-modal', 'App\Http\Controllers\Admin\CapitalController@print')->name('perubahan-modal.print');

  Route::get('neraca', 'App\Http\Controllers\Admin\NeracaController@index')->name('neraca.index');
  Route::post('neraca', 'App\Http\Controllers\Admin\NeracaController@print')->name('neraca.print');
  
  Route::get('arus-kas', 'App\Http\Controllers\Admin\ArusKasController@index')->name('arus-kas.index');
  Route::post('arus-kas', 'App\Http\Controllers\Admin\ArusKasController@print')->name('arus-kas.print');
}); 
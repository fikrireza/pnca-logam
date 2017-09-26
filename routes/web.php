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

// START FRONTEND
  Route::get('/', 'Frontend\FrontendController@home')
    ->name('frontend.home');
  
  Route::post('/permintaan-list-produk', 'Frontend\FrontendController@permintaanListProduk')
    ->name('frontend.permintaan.list.produk');

  Route::get('/tentang-kami', 'Frontend\FrontendController@tentangKami')
    ->name('frontend.tentang-kami');

  Route::get('/kontak', 'Frontend\FrontendController@kontak')
    ->name('frontend.kontak');
  Route::post('/kontak/simpan', 'Frontend\FrontendController@kontakSimpan')
    ->name('frontend.kontak.simpan');
  
// END FRONTEND

// START BACKEND
  // Auth::routes();
  Route::prefix('admin')->group(function(){

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Middleware Auth
    Route::middleware(['auth'])->group(function(){

      Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');

      Route::get('account', 'Backend\AccountController@index')->name('account.index');
      Route::post('account', 'Backend\AccountController@store')->name('account.store');
      Route::patch('account/update', 'Backend\AccountController@update')->name('account.update');
      
      Route::get('account/profile', 'Backend\AccountController@profile')->name('account.profile');

    });


  });
// END BACKEND

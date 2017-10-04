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
  
  // home 
    Route::get('/', 'Frontend\FrontendController@home')
      ->name('frontend.home');
    Route::post('/permintaan-list-produk', 'Frontend\FrontendController@permintaanListProduk')
      ->name('frontend.permintaan.list.produk');
  // home 

  // tentang kami
    Route::get('/tentang-kami', 'Frontend\FrontendController@tentangKami')
      ->name('frontend.tentang-kami');
  // tentang kami

  // standar
    Route::get('/standar', 'Frontend\FrontendController@standarIndex')
      ->name('frontend.standar.index');
    Route::get('/standar/produk', 'Frontend\FrontendController@standarProduk')
      ->name('frontend.standar.produk');
    Route::get('/standar/produk/{slug}', 'Frontend\FrontendController@standarProdukView')
      ->name('frontend.standar.produk.view');
    Route::get('/standar/servis', 'Frontend\FrontendController@standarServis')
      ->name('frontend.standar.servis');
    Route::get('/standar/servis/{slug}', 'Frontend\FrontendController@standarServisView')
      ->name('frontend.standar.servis.view');
  // standar

  // scrap
    Route::get('/scrap', 'Frontend\FrontendController@scrapIndex')
      ->name('frontend.scrap.index');
    // servis
      Route::get('/scrap/servis', 'Frontend\FrontendController@scrapServis')
        ->name('frontend.scrap.servis');
      Route::get('/scrap/servis/{slug}', 'Frontend\FrontendController@scrapServisView')
        ->name('frontend.scrap.servis.view');
    // servis
    // produk
      Route::get('/scrap/produk', 'Frontend\FrontendController@scrapProduk')
        ->name('frontend.scrap.produk');
      Route::get('/scrap/produk/{slug}', 'Frontend\FrontendController@scrapProdukView')
        ->name('frontend.scrap.produk.view');
    // produk
    // projek
      Route::get('/scrap/proyek', 'Frontend\FrontendController@scrapProjek')
        ->name('frontend.scrap.projek');
      Route::get('/scrap/proyek/{slug}', 'Frontend\FrontendController@scrapProjekView')
        ->name('frontend.scrap.projek.view');
    // projek
  // scrap

  // kontak
    Route::get('/kontak', 'Frontend\FrontendController@kontak')
      ->name('frontend.kontak');
    Route::post('/kontak/simpan', 'Frontend\FrontendController@kontakSimpan')
      ->name('frontend.kontak.simpan');
  // kontak
  
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

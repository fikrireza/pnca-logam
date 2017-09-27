<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class FrontendController extends Controller
{
  // home 
  	function home() {
  		return view('frontend.home-page.index');
  	}
    function permintaanListProduk(request $request) {
      $message = [
            'name_plp.required'   => 'dibutuhkan',
            'name_plp.min'    => 'terlalu pendek',
            'email_plp.required'  => 'dibutuhkan',
            'email_plp.email'   => 'format email salah',
            'phone_plp.required'  => 'dibutuhkan',
            'phone_plp.min'     => 'terlalu pendek',
            'phone_plp.max'     => 'terlalu panjang',
          ];

          $validator = Validator::make($request->all(), [
            'name_plp'  => 'required|min:3',
            'email_plp'   => 'required|email',
            'phone_plp'   => 'required|min:8|max:22',
          ], $message);

          if($validator->fails())
          {
            return redirect()
              ->route('frontend.home')
              ->withErrors($validator)
              ->withInput()
              ->with('autofocus_plp', true)
              ->with('info_plp', 'terjadi kesalahan...!')
              ->with('alert_plp', 'alert-danger');
          }

          return redirect()
              ->route('frontend.home')
              ->with('autofocus_plp', true)
              ->with('info_plp', 'berhasil')
              ->with('alert_plp', 'alert-success');
    }
  // home 

  // tentang kami
    function tentangKami() {
      return view('frontend.tentang-kami-page.index');
    }
  // tentang kami

  // standar
    function standarIndex() {
      return view('frontend.standar-page.index');
    }

    // produk
      function standarProduk() {
        $titlePage = "Produk";
        $routeView = "frontend.standar.produk.view";
        $items = [
          "Bajaringan Atap",
          "Besi As",
          "besi beton",
          "besi nako",
          "besi plat strip",
          "besi siku",
          "Chanel U",
          "channel c",
          "Hollow Stalbus",
          "Iwf H beam",
          "kawat bendrat",
          "kawat beton",
          "kawat putih",
          "pipa galvanished",
          "Pipa Hitam",
          "pipa seamless schedule",
          "plat hitam",
          "plat kapal",
          "wiremesh"
        ];
        $manyItems = count($items)-1;
        return view('frontend.standar-page.index-list', compact(
            'items',
            'manyItems',
            'titlePage',
            'routeView'
        ));
      }

      function standarProdukView($slug) {
        $titlePage = "Produk";
        $routeList = "frontend.standar.produk";
        $name = str_replace('-', ' ', $slug);
        
        $title = explode('-',$slug);
        $echoTitle = "";

        foreach ($title as $key) {
          $echoTitle = $echoTitle."<h1>".$key."</h1>";
        }

        return view('frontend.standar-page.index-list-view', compact(
            'titlePage',
            'routeList',
            'name',
            'echoTitle'
        ));
      }
    // produk
    
    // servis
      function standarServis() {
        $titlePage = "Servis";
        $routeView = "frontend.standar.servis.view";
        $items = [
          "Jasa Transportasi"
        ];
        $manyItems = count($items)-1;
        return view('frontend.standar-page.index-list', compact(
            'items',
            'manyItems',
            'titlePage',
            'routeView'
        ));
      }

      function standarServisView($slug) {
        $titlePage = "Servis";
        $routeList = "frontend.standar.servis";
        $name = str_replace('-', ' ', $slug);
        
        $title = explode('-',$slug);
        $echoTitle = "";

        foreach ($title as $key) {
          $echoTitle = $echoTitle."<h1>".$key."</h1>";
        }

        return view('frontend.standar-page.index-list-view', compact(
            'titlePage',
            'routeList',
            'name',
            'echoTitle'
        ));
      }
    // servis    
  // standar

  // kontak
  	function kontak() {
  		return view('frontend.kontak-page.index');
  	}

  	function kontakSimpan(request $request) {
  		$message = [
            'name.required' 	=> 'dibutuhkan',
            'name.min' 		=> 'terlalu pendek',
            'email.required'  => 'dibutuhkan',
            'email.email'  	=> 'format email salah',
            'telpon.required'	=> 'dibutuhkan',
            'telpon.min' 		=> 'terlalu pendek',
            'telpon.max' 		=> 'terlalu panjang',
            'subject.required'=> 'dibutuhkan',
            'subject.min' 	=> 'terlalu pendek',
            'pesan.required'	=> 'dibutuhkan',
            'pesan.min' 		=> 'terlalu pendek',
            'pesan.max' 		=> 'terlalu panjang',
            'g-recaptcha-response.required'  => 'dibutuhkan',
          ];

          $validator = Validator::make($request->all(), [
            'name' 	=> 'required|min:3',
            'email' 	=> 'required|email',
            'telpon'	=> 'required|min:8|max:22',
            'subject'	=> 'required|min:3',
            'pesan' 	=> 'required|min:10|max:580',
            'g-recaptcha-response' => 'required',
          ], $message);

          if($validator->fails())
          {
            return redirect()
            	->route('frontend.kontak')
            	->withErrors($validator)
            	->withInput()
            	->with('autofocus', true)
            	->with('info', 'terjadi kesalahan...!')
            	->with('alert', 'alert-danger');
          }
  	}
  // kontak


}

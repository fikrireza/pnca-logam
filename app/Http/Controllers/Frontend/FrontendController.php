<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use App\Models\Layanan;

class FrontendController extends Controller
{
  // home 
  	function home() {
      $servis = Layanan::where('kategori','SERVIS')->orderBy('id', 'desc')->paginate(5);

  		return view('frontend.home-page.index', compact('servis'));
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
              ->with('info_plp', 'Berhasil')
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
      function standarProduk(Request $request) {
        $titlePage = "Produk";
        $routeView = "frontend.standar.produk.view";
        
        $layanan = Layanan::where('kategori','PRODUK')->orderBy('nama', 'asc')->paginate(6);

        if ($request->ajax()) {
        $view = view('frontend.standar-page.list',compact('layanan', 'routeView'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.standar-page.index-list', compact(
            'layanan',
            'titlePage',
            'routeView'
        ));
      }

      function standarProdukView($slug) {
        $titlePage = "Produk";
        $routeList = "frontend.standar.produk";
        $layanan = Layanan::where('slug',$slug)->first();
        
        return view('frontend.standar-page.index-list-view', compact(
            'titlePage',
            'routeList',
            'layanan'
        ));
      }
    // produk
    
    // servis
      function standarServis(Request $request) {
        $titlePage = "Servis";
        $routeView = "frontend.standar.servis.view";
       
        $layanan = Layanan::where('kategori','SERVIS')->orderBy('nama', 'asc')->paginate(6);

        if ($request->ajax()) {
        $view = view('frontend.standar-page.list',compact('layanan', 'routeView'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.standar-page.index-list', compact(
            'layanan',
            'titlePage',
            'routeView'
        ));
      }

      function standarServisView($slug) {
        $titlePage = "Servis";
        $routeList = "frontend.standar.servis";
        $layanan = Layanan::where('slug',$slug)->first();

        return view('frontend.standar-page.index-list-view', compact(
            'titlePage',
            'routeList',
            'layanan'
        ));
      }
    // servis    
  // standar

  // scrap
    function scrapIndex() {
      $proyek = Layanan::where('kategori', 'SCRAPPROYEK')->orderBy('id', 'desc')->paginate(3);
      return view('frontend.scrap-page.index', compact('proyek'));
    }
    // servis
      function scrapServis(Request $request) {
        $titlePage = "Servis";
        $titlePageBody = "<h1>Servis</h1><h1><b>SCRAP</b></h1>";
        $routeView = "frontend.scrap.servis.view";
        
        $layanan = Layanan::where('kategori','SCRAPSERVIS')->orderBy('nama', 'asc')->paginate(6);

        if ($request->ajax()) {
        $view = view('frontend.scrap-page.list',compact('layanan', 'routeView'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.scrap-page.index-list', compact(
            'layanan',
            'titlePage',
            'titlePageBody',
            'routeView'
        ));
      }
      function scrapServisView($slug) {
        $titlePage = "Servis";
        $routeList = "frontend.scrap.servis";
        $layanan = Layanan::where('slug',$slug)->first();

        return view('frontend.scrap-page.index-list-view', compact(
            'titlePage',
            'routeList',
            'layanan'
        ));
      }
    // servis
    // produk
      function scrapProduk() {
        $titlePage = "Produk";
        $titlePageBody = "<h1>PRODUK</h1><h1><b>SCRAP</b></h1>";
        $routeView = "frontend.scrap.produk.view";
        
        $layanan = Layanan::where('kategori','SCRAPPRODUK')->orderBy('nama', 'asc')->paginate(6);

        $kategoriBesiName = [
            "Kategori Super",
            "Kategori A",
            "Kategori B",
            "Kategori C",
            "Kategori D",
            "Kategori E"
        ];
        $kategoriBesiDesc = [
            "Berupa: sisa potongan dari besi baru, bekas produksi pabrik, besi galangan kapal, fabrikasi konstruksi dengan asumsi tidak ada cat, tidak berkarat signifikan dengan tebal 8 mm ke atas.",
            "Berupa: besi bekas palat, besi beton 12 mm ke atas, besi eks alat berat, velg-velg mobil, besi bekas kontruksi (potongan wf, h beam, siku, unp) dengan tebal 4 mm up.",
            "Berupa: tinpalte, potongan container, besi beton 8-10 mm, bekas potongan mobil truk, besi kontruksi (potongan siku, u, cnp), bekas bengkel, dengan tebal 2-3 mm.",
            "Berupa : besi cor, rantai motor, plat tipis, besi beton 8 mm kebawah, velg motor, plat-plat tipis besi kontruksi (potongan, siku, cnp), dengan tebal 1-2 mm.",
            "Berupa: besi bekas gram mesin bubut rangka sepeda, drum, kursi, ranjang tidur, pipa-pipa tipis, plat cpu komputer, galvanis berkarat, dan lainnya.",
            "Berupa: besi bekas kaleng, atap seng, yang berkarat, dan lainnya."
        ];
        $manyKategori = count($kategoriBesiName)-1;

        return view('frontend.scrap-page.index-list', compact(
            'layanan',
            'titlePage',
            'titlePageBody',
            'routeView',
            'kategoriBesiName',
            'kategoriBesiDesc',
            'manyKategori'
        ));
      }
      // function scrapProdukView($slug) {
      //   $titlePage = "Produk";
      //   $routeList = "frontend.scrap.produk";
      //   $name = str_replace('-', ' ', $slug);
        
      //   return view('frontend.scrap-page.index-list-view', compact(
      //       'titlePage',
      //       'routeList',
      //       'name'
      //   ));
      // }
    // produk
    // project
      function scrapProjek(Request $request) {
        $titlePage = "Proyek";
        $titlePageBody = "<h1>PROYEK</h1><h1><b>KAMI</b></h1>";
        $routeView = "frontend.scrap.projek.view";
        $layanan = Layanan::where('kategori','SCRAPPROYEK')->orderBy('nama', 'asc')->paginate(6);

        if ($request->ajax()) {
        $view = view('frontend.scrap-page.list',compact('layanan', 'routeView'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('frontend.scrap-page.index-list', compact(
            'layanan',
            'titlePage',
            'titlePageBody',
            'routeView'
        ));
      }
      function scrapProjekView($slug) {
        $titlePage = "Proyek";
        $routeList = "frontend.scrap.projek";
        $layanan = Layanan::where('slug',$slug)->first();

        return view('frontend.scrap-page.index-list-view', compact(
            'titlePage',
            'routeList',
            'layanan'
        ));
      }
    // project
  // scrap

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

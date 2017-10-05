<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\General;

use Validator;
use DB;
use Image;

class GeneralController extends Controller
{

    public function menu()
    {
        $getMenu = General::select('id','produk','img_produk','servis','img_servis','scrapproduk','img_scrapproduk','scrapservis','img_scrapservis')
                            ->first();

        return view('backend.general.menu', compact('getMenu'));
    }

    public function menuUpdate(Request $request)
    {
        $message = [
          'produk.required' => 'Wajib di isi',
          'servis.required' => 'Wajib di isi',
          'scrapservis.required' => 'Wajib di isi',
          'scrapproduk.required' => 'Wajib di isi',
          'img_produk.dimensions' => 'Ukuran yg di terima 1024px x 1024px',
          'img_produk.image' => 'Format Gambar Tidak Sesuai',
          'img_produk.max' => 'File Size Terlalu Besar',
          'img_servis.dimensions' => 'Ukuran yg di terima 1024px x 1024px',
          'img_servis.image' => 'Format Gambar Tidak Sesuai',
          'img_servis.max' => 'File Size Terlalu Besar',
          'img_scrapproduk.dimensions' => 'Ukuran yg di terima 1024px x 1024px',
          'img_scrapproduk.image' => 'Format Gambar Tidak Sesuai',
          'img_scrapproduk.max' => 'File Size Terlalu Besar',
          'img_scrapservis.dimensions' => 'Ukuran yg di terima 1024px x 1024px',
          'img_scrapservis.image' => 'Format Gambar Tidak Sesuai',
          'img_scrapservis.max' => 'File Size Terlalu Besar',
        ];

        $validator = Validator::make($request->all(), [
          'produk' => 'required',
          'servis' => 'required',
          'scrapservis' => 'required',
          'scrapproduk' => 'required',
          'img_produk' => 'nullable|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1024,max_height=1024',
          'img_servis' => 'nullable|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1024,max_height=1024',
          'img_scrapservis' => 'nullable|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1024,max_height=1024',
          'img_scrapproduk' => 'nullable|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1024,max_height=1024',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('general.menu')->withErrors($validator)->withInput()->with('false-form', 'Ooopss, Error.');
        }

        DB::transaction(function () use($request) {
          $save = General::find($request->id);
          $save->produk = $request->produk;
          $save->servis = $request->servis;
          $save->scrapproduk = $request->scrapproduk;
          $save->scrapservis = $request->scrapservis;
          if($request->has('img_produk')){
            $salt = str_random(4);

            $image = $request->file('img_produk');
            $img_url = 'Produk-'.$salt. '.' . $image->getClientOriginalExtension();
            $upload1 = Image::make($image)->save('amadeo/images/'. $img_url);
            $save->img_produk = $img_url;
          }
          if($request->has('img_servis')){
            $salt = str_random(4);

            $image = $request->file('img_servis');
            $img_url = 'Servis-'.$salt. '.' . $image->getClientOriginalExtension();
            $upload1 = Image::make($image)->save('amadeo/images/'. $img_url);
            $save->img_servis = $img_url;
          }
          if($request->has('img_scrapproduk')){
            $salt = str_random(4);

            $image = $request->file('img_scrapproduk');
            $img_url = 'Scrap Produk-'.$salt. '.' . $image->getClientOriginalExtension();
            $upload1 = Image::make($image)->save('amadeo/images/'. $img_url);
            $save->img_scrapproduk = $img_url;
          }
          if($request->has('img_scrapservis')){
            $salt = str_random(4);

            $image = $request->file('img_scrapservis');
            $img_url = 'Scrap Servis-'.$salt. '.' . $image->getClientOriginalExtension();
            $upload1 = Image::make($image)->save('amadeo/images/'. $img_url);
            $save->img_scrapservis = $img_url;
          }
          $save->update();
        });


        return redirect()->route('general.menu')->with('berhasil', 'Berhasil Mengubah Menu');
    }

    public function email()
    {
        $getEmail = General::select('id','email_to', 'email_cc')->first();

        return view('backend.general.email', compact('getEmail'));
    }

    public function emailUpdate(Request $request)
    {
        $message = [
          'email_to.required' => 'Wajib di isi',
          'email_cc.required' => 'Wajib di isi',
          'email_to.email' => 'Format Email',
          'email_cc.email' => 'Format Email',
        ];

        $validator = Validator::make($request->all(), [
          'email_to' => 'required|email',
          'email_cc' => 'required|email',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('general.email')->withErrors($validator)->withInput();
        }

        DB::transaction(function () use($request) {
          $save = General::find($request->id);
          $save->email_to = $request->email_to;
          $save->email_cc = $request->email_cc;
          $save->update();
        });


        return redirect()->route('general.email')->with('berhasil', 'Berhasil Mengubah Email');

    }


}

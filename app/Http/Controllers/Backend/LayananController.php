<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Layanan;
use App\Models\General;

use Validator;
use DB;
use Image;
use File;

class LayananController extends Controller
{

    public function index()
    {
        $getLayanan = Layanan::get();

        return view('backend.layanan.index', compact('getLayanan'));
    }

    public function store(Request $request)
    {
        $message = [
          'kategori.required' => 'Wajib di isi',
          'nama.required' => 'Wajib di isi',
          'nama.max' => 'Terlalu Panjang, Maks 25 Karakter',
          'nama.unique' => 'Produk ini sudah ada',
          'deskripsi.required' => 'Wajib di isi',
          'deskripsi.min' => 'Terlalu Singkat',
          'img_url.required' => 'Wajib di isi',
          'img_url.dimensions' => 'Ukuran yg di terima 1024px x 1024px',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
        ];

        $validator = Validator::make($request->all(), [
          'kategori' => 'required',
          'nama' => 'required|max:35',
          'deskripsi' => 'required|min:20',
          'img_url' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1024,max_height=1024',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('layanan.index')->withErrors($validator)->withInput()->with('false-form', 'Wajib di isi');
        }

        DB::transaction(function () use($request) {
          $salt = str_random(4);

          $image = $request->file('img_url');
          $img_url = str_slug($request->nama,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
          $upload1 = Image::make($image)->save('amadeo/images/'. $img_url);

          $save = new Layanan;
          $save->kategori = $request->kategori;
          $save->nama = $request->nama;
          $save->deskripsi = $request->deskripsi;
          $save->img_url = $img_url;
          $save->img_alt = str_slug($request->nama);
          $save->slug = str_slug($request->nama,'-');
          $save->save();
        });


        return redirect()->route('layanan.index')->with('berhasil', 'Berhasil Menambahkan Layanan '.$request->nama);

    }

    public function edit($id)
    {
        $get = Layanan::find($id);

        if(!$get){
          abort(404);
        }

        return view('backend.layanan.ubah', compact('get'));
    }

    public function update(Request $request)
    {
        $message = [
          'kategori.required' => 'Wajib di isi',
          'nama.required' => 'Wajib di isi',
          'nama.max' => 'Terlalu Panjang, Maks 25 Karakter',
          'nama.unique' => 'Produk ini sudah ada',
          'deskripsi.required' => 'Wajib di isi',
          'deskripsi.min' => 'Terlalu Singkat',
          'img_url.dimensions' => 'Ukuran yg di terima 1024px x 1024px',
          'img_url.image' => 'Format Gambar Tidak Sesuai',
          'img_url.max' => 'File Size Terlalu Besar',
        ];

        $validator = Validator::make($request->all(), [
          'kategori' => 'required',
          'nama' => 'required|max:35',
          'deskripsi' => 'required|min:20',
          'img_url' => 'nullable|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=1024,max_height=1024',
        ], $message);


        if($validator->fails())
        {
            return redirect()->route('layanan.edit', ['id' => $request->layanan_id])->withErrors($validator)->withInput();
        }

        DB::transaction(function () use($request) {
          $save = Layanan::find($request->layanan_id);
          $save->kategori = $request->kategori;
          $save->nama = $request->nama;
          $save->deskripsi = $request->deskripsi;
          if($request->has('img_url')){
            $salt = str_random(4);

            $image = $request->file('img_url');
            $img_url = str_slug($request->nama,'-').'-'.$salt. '.' . $image->getClientOriginalExtension();
            $upload1 = Image::make($image)->save('amadeo/images/'. $img_url);
            $save->img_url = $img_url;
          }
          $save->img_alt = str_slug($request->nama);
          $save->slug = str_slug($request->nama,'-');
          $save->update();
        });


        return redirect()->route('layanan.index')->with('berhasil', 'Berhasil Mengubah Layanan '.$request->nama);
    }

    public function delete($id)
    {
        $get = Layanan::find($id);

        if(!$get){
          abort(404);
        }

        DB::transaction(function() use($get){
          File::delete('amadeo/images/'.$get->img_url);
          $get->delete();
        });

        return redirect()->route('layanan.index')->with('berhasil', 'Berhasil menghapus Layanan '.$get->nama);
    }


}

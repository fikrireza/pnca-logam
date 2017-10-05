<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kontak;
use App\Models\General;

use Validator;
use Mail;

class KontakController extends Controller
{


    public function index()
    {
        Kontak::where('flag_read', 'N')->update(['flag_read' => 'Y']);

        $getKontak = Kontak::get();


        return view('backend.kontak.index', compact('getKontak'));
    }
}

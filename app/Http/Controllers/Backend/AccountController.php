<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

use Validator;
use Mail;
use DB;
use Hash;

class AccountController extends Controller
{
    
    // Account
    public function index()
    {
        $getUsers = User::get();

        return view('backend.account.index', compact('getUsers'));

    }

    public function store(Request $request)
    {
        $message = [
          'name.required' => 'This field is required',
          'name.unique' => 'The name has already taken',
          'email.required' => 'This field is required',
          'email.email' => 'Format email not supported',
          'email.unique' => 'Email has already taken',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required|unique:amd_users',
          'email' => 'required|email|unique:amd_users',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('account.index')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

          $confirmation_code = str_random(30).time();
          $userSave = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(12345678),
            'confirmed' => 0,
            'login_count' => 0,
            'status' => 'N',
            'confirmation_code' => $confirmation_code,
          ]);

          $data = array([
            'name' => $request->name,
            'email' => $request->email,
            'confirmation_code' => $confirmation_code,
          ]);

          try {
            Mail::send('backend.email.confirm', ['data' => $data], function($message) use ($data) {
              $message->from('administrator@tingkat.co.id', 'Administrator')
                      ->to($data[0]['email'], $data[0]['name'])
                      ->subject('Aktivasi Akun CMS Tingkat');
            });
          } catch (\Exception $e) {
            return redirect()->route('account.index')->with('berhasil', 'New Account has been created, email '.$request->email.' cannot reached');
          }

        });

        return redirect()->route('account.index')->with('berhasil', 'New Account has been created, check '.$request->email.' for verification');
    }



    
}

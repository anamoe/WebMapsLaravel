<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function postlogin(Request $request)
    {

        $input = $request->all();

        $rules = [

            'username'     => 'required',
            'password'  => 'required',

        ];
        // error message untuk validasi
        $message = [
            'required' => ':attribute tidak boleh kosong!'
        ];
        // instansiasi validator
        $validator = Validator::make($request->all(), $rules, $message);

        // proses validasi
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        if (User::where('username', '=', $input['username'])->first() == true) {
            if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
               
                
                return redirect('/datajalan')->with('message', 'Berhasil Login');;
                
            } else {
                return redirect()->back()
                    ->with('error', 'Password salah');
            }
        } else {
           
            return redirect()->back()
                ->with('error', 'Username tidak ada atau belum terdaftar');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect('/login');
    }
}

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




        if (User::where('username', '=', $input['username'])->orWhere('email',$input['username'])->first() == true) {
            if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {

                switch (Auth::user()->role) {
                    case 'pelapor':
                        return redirect('/pelapor-datajalan')->with('message', 'Berhasil Login');
                        break;
                    case 'admin':
                        return redirect('/datajalan')->with('message', 'Berhasil Login');
                        break;         
                    default:
                        return redirect('/login');
                        break;
                }
               
                
                // return redirect('/datajalan')->with('message', 'Berhasil Login');
                
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

    public function postregister(Request $request)
    {

        
        if($request->konfirmasi_password != $request->password){
            return redirect()->back()
                ->with('error', 'Konfirmasi Password tidak sama');
        }

        if (User::where('username', '=', $request->username)->first() == false) {
            $request->merge([
                'role' => 'pelapor',
                'password' => bcrypt($request->password),    
                'email' => $request->email,        
                
            ]);

            User::create($request->except(['_token']));
           

            return redirect('login')->with('message', 'Berhasil Mendaftar');
            // return $i;
        } else {
            // return "eror";
            return redirect()->back()->with('error', 'username sudah terdaftar');
        }
    }
}

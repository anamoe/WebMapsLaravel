<?php

namespace App\Http\Controllers;

use App\Models\DataJalan;
use Illuminate\Http\Request;

class DataJalanController extends Controller
{
    //
    public function getdata(Request $request){

        $status= $request->status;

        if($status=='rusak'){
            $jalan = DataJalan::where('level_jalan','rusak')->where('status_verifikasi','disetujui')->get();

        }else if($status=='sedang'){
            $jalan = DataJalan::where('level_jalan','sedang')->where('status_verifikasi','disetujui')->get();

        }else{
            $jalan = DataJalan::where('status_verifikasi','disetujui')->get();
            
        }

 
        $titik_total = DataJalan::where('status_verifikasi','disetujui')->count();

        $data_baru = DataJalan::where('status_verifikasi','disetujui')->orderBy('id','DESC')->first();

        if($request->has('status')){
            return $jalan;
        }
        return view('layouts.master',compact('jalan','titik_total','data_baru','status'));
    }


  

    public function postdata(Request $request){

        $req = $request->all();
       $data= DataJalan::create($req);

        if($data){
            return response([
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $data
            ], 200);
            

        }else{
          return response([
                'message' => 'Data Gagal Ditambahkan',
                'data' => $data
            ], 400);

        }
    }


    

}

<?php

namespace App\Http\Controllers;

use App\Models\DataJalan;
use Illuminate\Http\Request;

class KelolaDataJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jalan = DataJalan::where('status_verifikasi','disetujui')->get();
        return view('admin.verifikasi.keloladata',compact('jalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.verifikasi.createmaps');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DataJalan::create([
            'level_jalan'=>$request->level_jalan,
            'start_latitude'=>$request->start_latitude,
            'start_longitude'=>$request->start_longitude,
            'end_latitude'=>$request->end_latitude,
            'end_longitude'=>$request->end_longitude,
            'kecepatan'=>$request->kecepatan,
            'status_verifikasi'=>'disetujui',
            'nama_penginput'=>$request->nama

        ]);
        return redirect('/datajalan')->with('message','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = DataJalan::find($id);
        return view('admin.verifikasi.editmaps',compact('data','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DataJalan::find($id);
        return view('admin.verifikasi.editmaps',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jalan = DataJalan::find($id);
        // return $jalan;
        $jalan->update([
            'level_jalan'=>$request->level_jalan,
            'start_latitude'=>$request->start_latitude,
            'start_longitude'=>$request->start_longitude,
            'end_latitude'=>$request->end_latitude,
            'end_longitude'=>$request->end_longitude,
            'kecepatan'=>$request->kecepatan,
        ]);

      

        return redirect('/datajalan')->with('message','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DataJalan::where('id',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }

    public function jalan_landpage(){
        $jalan = DataJalan::all();
        return view('landpage.list-jalan',compact('jalan'));
    }

    public function getdata_belum_acc(){
        $jalan = DataJalan::where('status_verifikasi','belum')->get();
        return view('admin.belumverifikasi.keloladata_belum_acc',compact('jalan'));
    }

    public function getdata_belum_acc_show($id){
        $data = DataJalan::find($id);
        return view('admin.belumverifikasi.editmaps',compact('data','id'));

    }

    public function update_status_belum_acc(Request $request, $id){
        $jalan = DataJalan::find($id);
        
        $jalan->update([
            'status_verifikasi'=>'disetujui',
        ]);
        
        return redirect('/list-jalan_belum_acc')->with('message','Data berhasil disetujui oleh admin');
    }


}

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
        $jalan = DataJalan::all();
        return view('layouts.keloladata',compact('jalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.createmaps');
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
        return view('layouts.editmaps',compact('data','id'));
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
        return view('layouts.editmaps',compact('data','id'));
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
        return view('layouts.list-jalan',compact('jalan'));
    }
}

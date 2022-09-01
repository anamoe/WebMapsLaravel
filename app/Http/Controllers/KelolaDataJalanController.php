<?php

namespace App\Http\Controllers;

use App\Models\DataJalan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaDataJalanController extends Controller
{
   //-------------------------------------admin ------------------------//
    public function index()
    {
        //
        // $jalan = DataJalan::where('status_verifikasi','disetujui')->get();
        $jalan = DB::table('data_jalans')->leftJoin('users', 'data_jalans.pelapor_id', '=', 'users.id')
        ->whereIn('status_verifikasi',['disetujui','ditolak'])
        ->orderBy('data_jalans.id', 'desc')
        ->select('users.username','data_jalans.*')
        ->get();
        return view('admin.verifikasi.keloladata',compact('jalan'));
    }


    public function create()
    {
        //
        return view('admin.verifikasi.createmaps');
    }


    public function store(Request $request)
    {
        //
        $namaFiles = '';
        //
        if ($request->hasFile('foto_laporan')) {


            $tujuan_upload = public_path('foto_laporan');
            $file = $request->file('foto_laporan');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
        DataJalan::create([
            'level_jalan'=>$request->level_jalan,
            'start_latitude'=>$request->start_latitude,
            'start_longitude'=>$request->start_longitude,
            'end_latitude'=>$request->end_latitude,
            'end_longitude'=>$request->end_longitude,
            'kecepatan'=>$request->kecepatan,
            'status_verifikasi'=>'disetujui',
            'admin_id'=>auth()->user()->id,
            'pelapor_id'=>auth()->user()->id,
            'foto_laporan'=>$namaFiles,

        ]);
        return redirect('/datajalan')->with('message','Data berhasil ditambahkan');
    }

  
    public function show($id)
    {
        //
        $data = DataJalan::find($id);
        return view('admin.verifikasi.editmaps',compact('data','id'));
    }

    public function edit($id)
    {
        //
        $data = DataJalan::find($id);
        return view('admin.verifikasi.editmaps',compact('data','id'));
    }
    public function detail($id)
    {
        //
        $data = DataJalan::find($id);
        return view('admin.verifikasi.detailmaps',compact('data','id'));
    }

 
    public function update(Request $request, $id)
    {
        //
        $namaFiles = '';
        //
        if ($request->hasFile('foto_laporan')) {


            $tujuan_upload = public_path('foto_laporan');
            $file = $request->file('foto_laporan');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
        $jalan = DataJalan::find($id);
        // return $jalan;
        $jalan->update([
            'level_jalan'=>$request->level_jalan,
            'start_latitude'=>$request->start_latitude,
            'start_longitude'=>$request->start_longitude,
            'end_latitude'=>$request->end_latitude,
            'end_longitude'=>$request->end_longitude,
            'kecepatan'=>$request->kecepatan,
            'admin_id'=>auth()->user()->id,
            // 'pelapor_id'=>auth()->user()->id,
            'foto_laporan'=>$namaFiles,
        ]);

      

        return redirect('/datajalan')->with('message','Data berhasil diubah');
    }

   
    public function destroy($id)
    {
        //
        DataJalan::where('id',$id)->update([
            'status_verifikasi'=>'dihapus',
          
        ]);

        return redirect()->back()->with('message','Data berhasil dihapus');
    }


    //-------------------------------------guestt ------------------------//

    public function jalan_landpage(Request $request){
        $status = $request->status;
  

        if ($status != null) {

            $jalan = DataJalan::where('status_verifikasi',$status)->orderBy('id','desc')->get();
       
       
       
           } else {
            $jalan = DataJalan::orderBy('id','desc')->get();
           
           }
    
        return view('landpage.list-jalan',compact('jalan','status'));
    }


//-------------------------------------admin ------------------------//


    public function getdata_belum_acc(){
        // $jalan = DataJalan::where('status_verifikasi','belum')->get();
        $jalan = DB::table('data_jalans')->leftJoin('users', 'data_jalans.pelapor_id', '=', 'users.id')
        ->where('status_verifikasi','belum')
        ->orderBy('data_jalans.id', 'desc')
        ->select('users.username','data_jalans.*')
        ->get();
        return view('admin.belumverifikasi.keloladata_belum_acc',compact('jalan'));
    }

    public function getdata_belum_acc_show($id){
        $data = DataJalan::find($id);
        return view('admin.belumverifikasi.editmaps',compact('data','id'));

    }

    public function update_status_belum_acc(Request $request, $id){
        $jalan = DataJalan::find($id);
        
        $jalan->update([
            'status_verifikasi'=>$request->status,
            'alasan_ditolak'=>$request->alasan,
        ]);

        if($jalan->status_verifikasi == 'disetujui'){
            return redirect('/list-jalan_belum_acc')->with('message','Data berhasil disetujui oleh admin');
          
        }elseif($jalan->status_verifikasi == 'ditolak'){
            return redirect('/list-jalan_belum_acc')->with('message','Data ditolak oleh admin');
        }

    }

    public function jalan_landpage_show($id){
        $data = DataJalan::find($id);
        return view('landpage.editmaps',compact('data','id'));

    }

    //-------------------------------------pelapor ------------------------//

    public function create_laporan_pelapor(Request $request){

        $namaFiles = '';
        //
        if ($request->hasFile('foto_laporan')) {


            $tujuan_upload = public_path('foto_laporan');
            $file = $request->file('foto_laporan');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }

        DataJalan::create([
            'level_jalan'=>$request->level_jalan,
            'start_latitude'=>$request->start_latitude,
            'start_longitude'=>$request->start_longitude,
            'end_latitude'=>$request->end_latitude,
            'end_longitude'=>$request->end_longitude,
            'kecepatan'=>$request->kecepatan,
            'status_verifikasi'=>'belum',
            'foto_laporan'=>$namaFiles,
            'pelapor_id'=>auth()->user()->id,

        ]);
        return redirect('/pelapor-datajalan')->with('message','Data Laporanberhasil ditambahkan');


    }
    public function view_laporan_pelapor(){

        $jalan = DataJalan::orderBy('id','desc')->where('pelapor_id',auth()->user()->id)->get();
        return view('pelapor.keloladata',compact('jalan'));

    }

    public function update_laporan(Request $request, $id)
    {

        $namaFiles = '';
        //
        if ($request->hasFile('foto_laporan')) {


            $tujuan_upload = public_path('foto_laporan');
            $file = $request->file('foto_laporan');
            $namaFile = Carbon::now()->format('Ymd') . $file->getClientOriginalName();
            $file->move($tujuan_upload, $namaFile);
            // $req['gambar_layanan']=$namaFile;
            $namaFiles = $namaFile;
        }
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
            'foto_laporan'=>$namaFiles,
            'pelapor_id'=>auth()->user()->id,

        ]);

      

        return redirect('/pelapor-datajalan')->with('message','Data berhasil diubah');
    }

    
    public function destroy_laporan($id)
    {
        //
        DataJalan::where('id',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }
    public function create_pelaporan()
    {
        //
        return view('pelapor.create-maps');
    }

    public function detail_laporan_pelapor($id)
    {
        //
        $data = DataJalan::find($id);
        return view('pelapor.detailmaps',compact('data','id'));
    }

    public function show_laporan_pelapor($id)
    {
        //
        $data = DataJalan::find($id);
        return view('pelapor.editmaps',compact('data','id'));
    }



  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TrackingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $tracking = DB::table('detail_sgas')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('dosen','dosen.id','=','sgas.id_dosen')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        // ->join('detail_pembimbingan','detail_pembimbingan.id_sgas','=','sgas.id_sgas')
                        // ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')
                        ->orderBy('detail_sgas.kode_matkul','desc')
                        ->get();

        // grab data from database
        return view('admin/tracking',['tracking' => $tracking]);
        //return $dosen;
    }

    public function hapus($id)
    {

        DB::table('detail_sgas')
            ->where('id_detailsgas',$id)
            ->delete();

        return redirect('/tracking');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekapMatkulController extends Controller
{
    //
    public function index(){
        //tampil di tabel
        $rekapmatkul = DB::table('matkul')
            ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->orderBy('id_detailsgas','desc')
            ->get();

        return view('admin/rekap_matkul',['rekapmatkul' => $rekapmatkul]);
    }
}
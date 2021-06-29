<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekapPenujangController extends Controller
{
    //
    public function index(){
        //tampil di tabel
        $rekappenunjang = DB::table('dosen')
            ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                DB::raw("(GROUP_CONCAT(detail_penunjang.jenis_kegiatan SEPARATOR '@')) as jenis"),
                DB::raw("(GROUP_CONCAT(detail_penunjang.sks SEPARATOR '@')) as sks"))
            ->join('sgas','sgas.id_dosen','=','dosen.id')
            ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
            ->get();

        // dd($rekapmatkul);

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        return view('admin/rekap_penunjang',['rekappenunjang' => $rekappenunjang, 'items' => $items]);

        //return $nama;
    }

    public function print(){
        //tampil di tabel
        $rekappenunjang = DB::table('dosen')
            ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                DB::raw("(GROUP_CONCAT(detail_penunjang.jenis_kegiatan SEPARATOR '@')) as jenis"),
                DB::raw("(GROUP_CONCAT(detail_penunjang.sks SEPARATOR '@')) as sks"))
            ->join('sgas','sgas.id_dosen','=','dosen.id')
            ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
            ->get();

        // dd($rekapmatkul);

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        return view('report/print_rekap_penunjang',['rekappenunjang' => $rekappenunjang, 'items' => $items]);

        //return $nama;
    }
}

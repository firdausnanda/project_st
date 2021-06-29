<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekapDosenController extends Controller
{
    //
    public function index(){
        //tampil di tabel
        $rekapdosen = DB::table('dosen')
            ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
            ->join('sgas','sgas.id_dosen','=','dosen.id')
            ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->groupBy('dosen.nidn','ta.ta','sgas.semester')
            ->get();
        
        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        // dd($rekapdosen);
        return view('admin/rekap_dosen',['rekapdosen' => $rekapdosen, 'items' => $items]);

        //return $nama;
    }

    public function print(){
        //tampil di tabel
        $rekapdosen = DB::table('dosen')
            ->select("dosen.nidn","dosen.nama",
                DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
            ->join('sgas','sgas.id_dosen','=','dosen.id')
            ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->groupBy('dosen.nidn','ta.ta','sgas.semester')
            ->get();
        
        // dd($rekapdosen);
        return view('report/print_rekap_dosen',['rekapdosen' => $rekapdosen]);

        //return $nama;
    }
}

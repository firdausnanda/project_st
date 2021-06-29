<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekapPembimbinganController extends Controller
{
    //
    public function index(){
        //tampil di tabel
        $rekappembimbingan = DB::table('dosen')
            ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                DB::raw("(GROUP_CONCAT(detail_pembimbingan.jenis_kegiatan SEPARATOR '@')) as jenis"),
                DB::raw("(GROUP_CONCAT(detail_pembimbingan.sks SEPARATOR '@')) as sks"))
            ->join('sgas','sgas.id_dosen','=','dosen.id')
            ->join('detail_pembimbingan','detail_pembimbingan.id_sgas','=','sgas.id_sgas')            
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
            ->get();

        // dd($rekapmatkul);

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        return view('admin/rekap_pembimbingan',['rekappembimbingan' => $rekappembimbingan, 'items' => $items]);

        //return $nama;
    }

    public function print(Request $request){
        //tampil di tabel
        $ta = $request->taa;
        $smt = $request->semesterr;

        if ($ta == null and $smt == null) {

            $rekappembimbingan = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_pembimbingan','detail_pembimbingan.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();

        }elseif($ta == null){

            $rekappembimbingan = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_pembimbingan','detail_pembimbingan.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();

        }elseif($smt == null){

            $rekappembimbingan = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_pembimbingan','detail_pembimbingan.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();
        }else{

            $rekappembimbingan = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_pembimbingan.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_pembimbingan','detail_pembimbingan.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();

        }
        
        return view('report/print_rekap_pembimbingan',['rekappembimbingan' => $rekappembimbingan]);

        //return $nama;
    }
}

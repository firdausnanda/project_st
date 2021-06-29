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
            ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester",
                DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
            ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->orderBy('id_detailsgas','desc')
            ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
            ->get();

        // dd($rekapmatkul);

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        return view('admin/rekap_matkul',['rekapmatkul' => $rekapmatkul, 'items' => $items]);

        //return $nama;
    }

    public function print(Request $request){
        $ta = $request->taa;
        $smt = $request->semesterr;

        if($ta == null and $smt == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();

        }elseif($ta == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();

        }elseif($smt == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
        }else{

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
        }

        // dd($ta);
        return view('report/print_rekap_matkul',['rekapmatkul' => $rekapmatkul]);
        //return $nama;
    }
}

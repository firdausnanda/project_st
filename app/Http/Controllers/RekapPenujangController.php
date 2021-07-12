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

    public function print(Request $request){
        //tampil di tabel
        $ta = $request->taa;
        $smt = $request->semesterr;

        if($ta == null and $smt == null){

            $rekappenunjang = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_penunjang.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_penunjang.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                ->sum('detail_penunjang.sks');

        }elseif($ta == null){

            $rekappenunjang = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_penunjang.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_penunjang.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->sum('detail_penunjang.sks');

        }elseif($smt == null){

            $rekappenunjang = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_penunjang.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_penunjang.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->taa)
                ->where('sgas.validasi','=',1)
                ->sum('detail_penunjang.sks');

        }else{

            $rekappenunjang = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                    DB::raw("(GROUP_CONCAT(detail_penunjang.jenis_kegiatan SEPARATOR '@')) as jenis"),
                    DB::raw("(GROUP_CONCAT(detail_penunjang.sks SEPARATOR '@')) as sks"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','dosen.nama','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_penunjang','detail_penunjang.id_sgas','=','sgas.id_sgas')            
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->sum('detail_penunjang.sks');
        }
        

        // dd($rekapmatkul);
        return view('report/print_rekap_penunjang',['rekappenunjang' => $rekappenunjang,'totalsks' => $totalsks]);

        //return $nama;
    }
}

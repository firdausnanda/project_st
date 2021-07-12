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
            ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"),
                // DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                // DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                // DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                DB::raw("SUM(detail_sgas.grandtotal) as total"))
            ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->where('sgas.validasi','=',1)
            ->orderBy('id_detailsgas','desc')
            ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
            ->get();

        // dd($rekapmatkul);

        //untuk select box prodi
        $prodi = DB::table('prodi')
            ->orderBy('id_prodi','desc')
            ->get();

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        return view('admin/rekap_matkul',['rekapmatkul' => $rekapmatkul, 'items' => $items, 'prodi' => $prodi]);

        //return $nama;
    }

    public function print(Request $request){
        $ta = $request->taa;
        $smt = $request->semesterr;
        $prd = $request->prodii;

        if($ta == null and $smt == null and $prd == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas",
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"),
                    DB::raw("SUM(detail_sgas.grandtotal) as total"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");

        }elseif($ta == null and $smt == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");

        }elseif($ta == null and $prd == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");

        }elseif($smt == null and $prd == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->taa)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");

        }elseif($ta == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");

        }elseif($smt == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");

        }elseif($prd == null){

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");
        }else{

            $rekapmatkul = DB::table('matkul')
                ->select("matkul.kode_matkul","matkul.nama_matkul","matkul.sks","matkul.t","matkul.p","matkul.k","ta.ta","sgas.semester","detail_sgas.kelas","matkul.prodii",
                    DB::raw("SUM(detail_sgas.grandtotal) as total"),
                    DB::raw("(GROUP_CONCAT(dosen.nama SEPARATOR '@')) as nama"))
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->groupBy('matkul.kode_matkul','matkul.nama_matkul','matkul.sks','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('matkul')
                ->join('detail_sgas','detail_sgas.kode_matkul','=','matkul.kode_matkul')
                ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                ->join('dosen','dosen.id','=','sgas.id_dosen')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->orderBy('id_detailsgas','desc')
                ->sum("detail_sgas.grandtotal");
        }

        // dd($ta);
        return view('report/print_rekap_matkul',['rekapmatkul' => $rekapmatkul, 'totalsks' => $totalsks, 'ta' => $ta, 'smt' => $smt, 'prd' => $prd]);
        //return $nama;
    }
}

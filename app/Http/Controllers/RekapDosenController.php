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
            ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
            ->join('sgas','sgas.id_dosen','=','dosen.id')
            ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->where('sgas.validasi','=',1)
            ->groupBy('dosen.nidn','ta.ta','sgas.semester')
            ->get();
        
        //untuk select box prodi
        $prodi = DB::table('prodi')
            ->orderBy('id_prodi','desc')
            ->get();

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        // dd($rekapdosen);
        return view('admin/rekap_dosen',['rekapdosen' => $rekapdosen, 'items' => $items, 'prodi' => $prodi]);

        //return $nama;
    }

    public function print(Request $request){
        //tampil di tabel
        $ta = $request->taa;
        $smt = $request->semesterr;
        $prd = $request->prodii;

        if($ta == null and $smt == null and $prd == null){
            
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                // ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                //     DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                //->get();
                ->sum("detail_sgas.grandtotal");

        }elseif($ta == null and $smt == null){

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                // ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                //     DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                //->get();
                ->sum("detail_sgas.grandtotal");

        }elseif($ta == null and $prd == null){

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                // ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                //     DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                //->get();
                ->sum("detail_sgas.grandtotal");

        }elseif($smt == null and $prd == null){

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                // ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                //     DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                //->get();
                ->sum("detail_sgas.grandtotal");

        }elseif($ta == null){

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                // ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester",
                //     DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                //     DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                //->get();
                ->sum("detail_sgas.grandtotal");

        }elseif($smt == null){

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
               
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                // ->get();
                ->sum("detail_sgas.grandtotal");

        }elseif($prd == null){

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
               
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                // ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                // ->get();
                ->sum("detail_sgas.grandtotal");

        }else{

            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","matkul.prodii",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.semester','=',$request->semesterr)
                ->where('matkul.prodii','=',$request->prodii)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->sum("detail_sgas.grandtotal");
        }
        
        // dd($rekapdosen);
        return view('report/print_rekap_dosen',['rekapdosen' => $rekapdosen, 'totalsks' => $totalsks, 'ta' => $ta, 'smt' => $smt, 'prd' => $prd]);

        //return $nama;
    }
}

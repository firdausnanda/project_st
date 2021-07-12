<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekapDosenTotalController extends Controller
{
    //
    public function index(){
        //tampil di tabel
        $rekapdosen = DB::table('dosen')
            ->select("dosen.nidn","dosen.nama","ta.ta","sgas.semester","dosen.status",
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
        return view('admin/rekap_dosen_total',['rekapdosen' => $rekapdosen, 'items' => $items]);

        //return $nama;
    }

    public function print(Request $request){
        //tampil di tabel
        $ta = $request->taa;
        $smt = $request->semesterr;
        $sts = $request->statuss;

        if ($sts == null and $smt == null and $sts == null) {
            # code...
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                // ->where('sgas.semester','=',$request->semesterr)
                // ->where('ta.ta','=',$request->taa)
                // ->where('dosen.status','=',$request->statuss)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.validasi','=',1)
                ->sum('detail_sgas.grandtotal');

        }elseif($ta == null and $sts == null) {
            # code...
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
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
                // ->where('ta.ta','=',$request->taa)
                // ->where('dosen.status','=',$request->statuss)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('sgas.validasi','=',1)
                // ->where('ta.ta','=',$request->taa)
                // ->where('dosen.status','=',$request->statuss)
                ->sum('detail_sgas.grandtotal');
                
        }elseif($smt == null and $sts == null) {
            # code...
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                // ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                // ->where('dosen.status','=',$request->statuss)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                // ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                // ->where('dosen.status','=',$request->statuss)
                ->sum('detail_sgas.grandtotal');

        }elseif($ta == null and $smt == null) {
            # code...
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                // ->where('sgas.semester','=',$request->semesterr)
                // ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                // ->where('sgas.semester','=',$request->semesterr)
                // ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->sum('detail_sgas.grandtotal');

        }elseif ($sts == null) {
            # code...
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                // ->where('dosen.status','=',$request->statuss)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('sgas.validasi','=',1)
                ->sum('detail_sgas.grandtotal');

        }elseif($smt == null) {
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                // ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->sum('detail_sgas.grandtotal');

        }elseif($ta == null) {
            # code...
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                // ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();

            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                // ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->sum('detail_sgas.grandtotal');

        }else{
            $rekapdosen = DB::table('dosen')
                ->select("dosen.nidn","dosen.nama","dosen.status","ta.ta","sgas.semester",
                    DB::raw("GROUP_CONCAT(matkul.nama_matkul SEPARATOR '@') as nama_matkul"),
                    DB::raw("GROUP_CONCAT(detail_sgas.total SEPARATOR '@') as sks"),
                    DB::raw("GROUP_CONCAT(detail_sgas.kelas SEPARATOR '@') as kelas"),
                    DB::raw("GROUP_CONCAT(detail_sgas.grandtotal SEPARATOR '@') as total"))
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->groupBy('dosen.nidn','ta.ta','sgas.semester')
                ->get();
            
            $totalsks = DB::table('dosen')
                ->join('sgas','sgas.id_dosen','=','dosen.id')
                ->join('detail_sgas','detail_sgas.id_sgas','=','sgas.id_sgas')
                ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                ->join('ta','ta.id_ta','=','sgas.ta')
                ->where('sgas.semester','=',$request->semesterr)
                ->where('ta.ta','=',$request->taa)
                ->where('dosen.status','=',$request->statuss)
                ->where('sgas.validasi','=',1)
                ->sum('detail_sgas.grandtotal');
        }

        
        
        // dd($sts);
        return view('report/print_rekap_dosen_total',['rekapdosen' => $rekapdosen,'totalsks' => $totalsks]);

        //return $nama;
    }
}

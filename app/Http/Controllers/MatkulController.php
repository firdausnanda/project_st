<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatkulController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $matkul = DB::table('matkul')
                        ->orderBy('id_matkul','desc')
                        ->get();
        
        $dosen = DB::table('dosen')
                        ->orderBy('id','desc')
                        ->get();
        
        $prodi = DB::table('prodi')
                        ->orderBy('id_prodi','desc')
                        ->get();                


        // grab data from database
        return view('admin/matkul',['matkul' => $matkul, 'dosen' => $dosen, 'prodi' => $prodi]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'kode_matkul' => 'required|min:3|max:20|unique:matkul'
        ]);

        DB::table('matkul')->insert([
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            't' => $request->tsks,
            'p' => $request->psks,
            'k' => $request->ksks,
            'kurikulum' => $request->kurikulum,
            'nama_dosen' => $request->pjmk,
            'prodii' => $request->prodi,
            'created_at' =>  \Carbon\Carbon::now(), 
            'updated_at' => \Carbon\Carbon::now()
            ]);
           
        return redirect('/matkul');
    }

    public function update(Request $request){

        DB::table('matkul')->where('kode_matkul',$request->kode_matkul)->update([
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
            't' => $request->tsks,
            'p' => $request->psks,
            'k' => $request->ksks,
            'kurikulum' => $request->kurikulum,
            'nama_dosen' => $request->pjmk,
            'prodii' => $request->prodi,
            'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect('/matkul');
    }

    public function hapus($id)
    {
    
        DB::table('Matkul')->where('id_matkul',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }
}

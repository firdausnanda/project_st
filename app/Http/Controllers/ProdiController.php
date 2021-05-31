<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $prodi = DB::table('prodi')
                        ->orderBy('id_prodi','desc')
                        ->get();

        // grab data from database
        return view('admin/prodi',['prodi' => $prodi]);
    }

    public function store(Request $request){

        $cek = DB::table('prodi')
            ->where('nama_prodi','=', $request->prodi)
            ->count();

        //return $cek;
        
        if ($cek != 1) {
            DB::table('prodi')->insert([
            'nama_prodi' => $request->prodi,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('/prodii');

        }else {

        return redirect('/prodii')->with('error','Data Sudah Ada');

        }
    }

    public function update(Request $request){

        DB::table('prodi')->where('id_prodi',$request->id)->update([
            'nama_prodi' => $request->nama_prodi,
            'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect('/prodii');
    }

    public function hapus($id)
    {
    
        DB::table('prodi')->where('id_prodi',$id)->delete();
        //DB::table('sgas')->where('ta',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }
}

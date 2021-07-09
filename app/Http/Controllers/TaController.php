<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $ta = DB::table('ta')
                        ->orderBy('ta','desc')
                        ->get();

        // grab data from database
        return view('admin/ta',['ta' => $ta]);
    }

    public function store(Request $request){

        $cek = DB::table('ta')
            ->where('ta','=', $request->ta)
            ->count();

        //return $cek;
        
        if ($cek != 1) {
            DB::table('ta')->insert([
            'ta' => $request->ta,
            'tglgjl' => $request->tglgjl,
            'tglgnp' => $request->tglgnp,
            'min' => $request->min,
            'max' => $request->max,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect('/ta');

        }else {

        return redirect('/ta')->with('error','Data Sudah Ada');
        

        }
    }

    public function update(Request $request){

        DB::table('ta')->where('id_ta',$request->id)->update([
            'ta' => $request->ta,
            'tglgjl' => $request->tglgjl,
            'tglgnp' => $request->tglgnp,
            'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect('/ta');
    }

    public function hapus($id)
    {
    
        DB::table('ta')->where('id_ta',$id)->delete();
        DB::table('sgas')->where('ta',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }
}

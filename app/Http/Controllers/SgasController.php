<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dosen;
use Illuminate\Support\Facades\Auth;



class SgasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $sgas = DB::table('sgas')
            ->join('dosen','sgas.id_dosen','=','dosen.id')
            ->join('ta','ta.id_ta','=','sgas.ta')
            ->orderBy('id_sgas','desc')
            ->orderBy('validasi','asc')
            ->get();

        $items = DB::table('ta')
            ->orderBy('id_ta','desc')
            ->get();

        $nama = DB::table('dosen')
            ->orderBy('id','desc')
            ->get();

        $prodi = DB::table('prodi')
            ->orderBy('id_prodi','desc')
            ->get();

        // grab data from database
        return view('admin/sgas',['sgas' => $sgas, 'items'=> $items, 'nama'=> $nama, 'prodi'=> $prodi ]);
    }

    public function loadData($id=0)
    {
        //autofill
    	//$data = Dosen::where('nama', $id)->first();
        $data = DB::table('dosen')
            ->where('nama','=',$id)
            ->first();

    	return response()->json($data);
    }

    public function store(Request $request){

        $cek = DB::table('sgas')
            ->join('dosen','sgas.id_dosen','=','dosen.id')
            ->where('dosen.id','=', $request->id)
            ->where('ta','=', $request->ta)
            ->where('semester','=', $request->semester)
            ->count();
        
        $cekplot = DB::table('sgas')
            ->select(DB::raw("max(no_plot) as no_plot"))
            ->where('ta','=', $request->ta)
            ->value('no_plot');
        
        $cekplotmin = DB::table('ta')
            ->select('min')
            ->where('id_ta','=', $request->ta)
            ->value('min');
        
        $cekplotmax = DB::table('ta')
            ->select('max')
            ->where('id_ta','=', $request->ta)
            ->value('max');

        $cekplotstore = $cekplot + 1;
        
        if($cekplot = 0){
            $nostore = $cekplotmin;
        }else{
            $nostore = $cekplotstore;
        }
        
        //dd($cekplotmax);

        if ($cek != 1) {
            
            if($nostore <= $cekplotmax){
                DB::table('sgas')->insert([
                    'id_dosen' => $request->id,
                    'ta' => $request->ta,
                    'semester' => $request->semester,
                    'validasi' => '0',
                    'no_plot' => $nostore,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]);
    
                return redirect('/sgas');
            }else{
                return redirect('/sgas')->with('error','No Plot Surat Melebihi Batas');
            }
        }else {
            return redirect('/sgas')->with('error','Data Sudah Ada'); 
        }
           
    }

    // public function update(Request $request){

    //     DB::table('sgas')->where('nidn',$request->nidnn)->update([
    //         'semester' => $request->semester,
    //         'ta' => $request->ta,
    //         'updated_at' => \Carbon\Carbon::now()
    //         ]);

    //     return redirect('/sgas');
    // }

    public function hapus($id){

        DB::table('sgas')->where('id_sgas',$id)->delete();
        DB::table('detail_sgas')->where('id_sgas',$id)->delete();
        DB::table('detail_penunjang')->where('id_sgas',$id)->delete();
        DB::table('detail_pembimbingan')->where('id_sgas',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function cari(Request $request){

        $ta = $request->ta;
        $smt = $request->semester;


        $sgas = DB::table('sgas')
            ->Where('ta','like',"%".$ta."%")
            ->orWhere('semester','like',"%".$smt."%")
            ->get();

        return view('admin/sgas',['sgas' => $sgas]);

    }

    public function validasi(){
                   
        DB::table('sgas')->update([
                'validasi' => '1',
                'updated_at' => \Carbon\Carbon::now()
                ]);
        
        return redirect('/sgas');
    }

    public function batalvalidasi(){
                   
        DB::table('sgas')->update([
                'validasi' => '0',
                'updated_at' => \Carbon\Carbon::now()
                ]);
        
        return redirect('/sgas');
    }





    // ROLE ADMIN/PRODI \\

    public function indexadmin(){

        $sgas = DB::table('sgas')
            ->join('dosen','sgas.id_dosen','=','dosen.id')
            // ->join('dosen','sgas.nidn','=','dosen.nidn')
            ->join('ta','ta.id_ta','=','sgas.ta')
            //->join('users','users.prodi','=', 'sgas.nidn')
            //->where('sgas.prodi','=', Auth::user()->prodi)
            ->orderBy('id_sgas','desc')
            ->get();

        $items = DB::table('ta')
            ->orderBy('ta','desc')
            ->get();

        $nama = DB::table('dosen')
            ->orderBy('id','desc')
            ->get();

        // grab data from database
        return view('prodi/sgas',['sgas' => $sgas, 'items'=> $items, 'nama'=> $nama ]);
        //return $sgas;
    }

    public function storeAdmin(Request $request){

        $cek = DB::table('sgas')
            ->join('dosen','sgas.id_dosen','=','dosen.id')
            ->where('dosen.id','=', $request->id)
            // ->where('nidn','=', $request->nidn)
            ->where('ta','=', $request->ta)
            ->where('semester','=', $request->semester)
            ->count();
        
        $cekplot = DB::table('sgas')
            ->select(DB::raw("max(no_plot) as no_plot"))
            ->where('ta','=', $request->ta)
            ->value('no_plot');
        
        $cekplotmin = DB::table('ta')
            ->select('min')
            ->where('id_ta','=', $request->ta)
            ->value('min');
        
        $cekplotmax = DB::table('ta')
            ->select('max')
            ->where('id_ta','=', $request->ta)
            ->value('max');

        $cekplotstore = $cekplot + 1;
        
        if($cekplot = 0){
            $nostore = $cekplotmin;
        }else{
            $nostore = $cekplotstore;
        }
        
        if ($cek != 1) {
            
            DB::table('sgas')->insert([
            'id_dosen' => $request->id,
            'ta' => $request->ta,
            'semester' => $request->semester,
            'validasi' => '0',
            'no_plot' => $nostore,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ]);

            return redirect('/inputdata');

        }else {
            return redirect('/inputdata')->with('error','Data Sudah Ada'); 
        //return "gagal";
        }
    }

    public function loadDataNama($id=0)
    {
    	//$data = Dosen::where('nama', $id)->first();
        $data = DB::table('dosen')
            ->where('nama','=',$id)
            ->first();
    	return response()->json($data);
    }






    // ROLE USER \\

    public function indexuser(){
        $sgas = DB::table('sgas')
            ->join('dosen','sgas.id_dosen','=','dosen.id')
            ->join('ta','ta.id_ta','=','sgas.ta')
            // ->join('users','users.email','=', 'sgas.nidn')
            ->where('dosen.nidn','=', Auth::user()->email)
            ->where('validasi','=','1')
            ->orderBy('id_sgas','desc')
            ->get();

        $items = DB::table('ta')
            ->orderBy('ta','desc')
            ->get();

        $nama = DB::table('dosen')
            ->orderBy('id','desc')
            ->get();

        // grab data from database
        return view('user/sgas',['sgas' => $sgas, 'items'=> $items, 'nama'=> $nama ]);
    }
   
}

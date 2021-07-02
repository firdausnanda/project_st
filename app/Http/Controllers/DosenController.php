<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DosenController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $dosen = DB::table('dosen')
                        ->orderBy('id','desc')
                        ->get();

        $prodi = DB::table('prodi')
                        ->orderBy('id_prodi','desc')
                        ->get();

        // grab data from database
        return view('admin/dosen',['dosen' => $dosen, 'prodi' => $prodi]);
    }

    public function store(Request $request){

        // $cek = DB::table('dosen')
        //     ->where('nik','=', $request->nik)
        //     ->count();
        
        $cekN = DB::table('dosen')
            ->where('nidn','=', $request->nidn)
            ->count();

        if ($cekN == 1) {
            return redirect('/dosen')->with('error','Data Sudah NIDN Ada');
        }else {
            DB::table('dosen')->insert([
                'nidn' => $request->nidn,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'jabatan_fungsional' => $request->jabatan_fungsional,
                'status' => $request->status,
                'created_at' =>  \Carbon\Carbon::now(), 
                'updated_at' => \Carbon\Carbon::now()
                ]);
    
            DB::table('users')->insert([
                    'name' => $request->nama,
                    'email' => $request->nidn,
                    'password' => Hash::make($request->nidn),
                    'role' => 'user',
                    'created_at' =>  \Carbon\Carbon::now(), 
                    'updated_at' => \Carbon\Carbon::now()
                    ]);
                    
            return redirect('/dosen');
        }
    }

    public function update(Request $request){

        DB::table('dosen')->where('id',$request->id)->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jabatan_fungsional' => $request->jabatan_fungsional,
            'status' => $request->status,
            'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect('/dosen');
    }

    public function hapus($id)
    {
    
        DB::table('dosen')
            ->where('id',$id)
            ->delete();
        
        $sgas = DB::table('sgas')
                    ->where('id_dosen',$id)
                    ->get();
        
        $users = DB::table('users')
                    ->where('email',$id)
                    ->delete();

        // dd($sgas);
        
        if($sgas == null){
            DB::table('sgas')
                ->where('nidn',$id)
                ->delete();
        }

        if($users == null){
            DB::table('users')
                ->where('email',$id)
                ->delete();
        }
        
        return redirect('/dosen');
    }
}

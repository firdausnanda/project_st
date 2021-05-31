<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $akun = DB::table('users')
                        ->where('id','=',Auth::user()->id)
                        ->orderBy('id','desc')
                        ->get();

        // grab data from database
        return view('admin/profil',['akun' => $akun]);
    }

    public function store(Request $request){

        if ($request->password == NULL || $request->password == '') {
            
            DB::table('users')->where('id',$request->id)->update([
                'name' => $request->username,
                'email' => $request->email,
                'updated_at' => \Carbon\Carbon::now()
                ]);

            if (Auth::user()->role == 'superadmin') {
                return redirect('/profile');
            }elseif (Auth::user()->role == 'admin') {
                return redirect('/profileadmin');
            }elseif (Auth::user()->role == 'user') {
                return redirect('/profileuser');
            }

                
        }elseif ($request->password == $request->pass && strlen($request->pass) >= 8 && strlen($request->password) >= 8) {
            
            DB::table('users')->where('id',$request->id)->update([
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'updated_at' => \Carbon\Carbon::now()
                ]);

            if (Auth::user()->role == 'superadmin') {
                return redirect('/profile');
            }elseif (Auth::user()->role == 'admin') {
                return redirect('/profileadmin');
            }elseif (Auth::user()->role == 'user') {
                return redirect('/profileuser');
            }
              
        }elseif (strlen($request->pass) <= 8 && strlen($request->password) <= 8) {

            return redirect()->back()->with('error','Password Harus Lebih dari 8 Karakter!');
               
        }elseif ($request->password != $request->pass) {

            return redirect()->back()->with('error','Password Tidak Sama!');

        }
    }

    ///////////////////////// ROLE ADMIN/PRODI \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function indexadmin(){

    $akun = DB::table('users')
    ->where('id','=',Auth::user()->id)
    ->orderBy('id','desc')
    ->get();

    // grab data from database
    return view('prodi/profil',['akun' => $akun]);
    }

    ///////////////////////// ROLE USER/DOSEN \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function indexuser(){

    $akun = DB::table('users')
    ->where('id','=',Auth::user()->id)
    ->orderBy('id','desc')
    ->get();

    // grab data from database
    return view('user/profil',['akun' => $akun]);
    }




}

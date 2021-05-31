<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AkunController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $akun = DB::table('users')
                        ->orderBy('id','desc')
                        ->get();

        // grab data from database
        return view('admin/akun',['akun' => $akun]);
    }

    public function store(Request $request){

        DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'created_at' =>  \Carbon\Carbon::now(), 
                'updated_at' => \Carbon\Carbon::now()
                ]);
           
        return redirect('/akun');
    }

    public function update(Request $request){

        DB::table('users')->where('id',$request->id_akun)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'updated_at' => \Carbon\Carbon::now()
            ]);

        return redirect('/akun');
    }

    public function hapus($id)
    {
    
        DB::table('users')
            ->where('id',$id)
            ->delete();

        return redirect('/akun');
    }
}

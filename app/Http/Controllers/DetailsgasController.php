<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Auth;


class DetailsgasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){

        //tampil di tabel
        $detail_sgas = DB::table('detail_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->get();

        //ngecek validasi & semester (ganjil/genap)
        $ngecek = DB::table('sgas')
            ->where('id_sgas','=',$id)
            //->where('prodi','=',Auth::user()->prodi)
            ->orderBy('id_sgas','desc')
            ->get();

        //untuk print
        $print = DB::table('detail_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->where('id_sgas','=',$id)
            ->limit(1)
            ->get();

        //tampil keterangan dosen
        $items = DB::table('sgas')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->where('id_sgas','=',$id)
            ->orderBy('id_sgas','desc')
            ->get();
        
        //tampil data matkul
        $matkul = DB::table('matkul')
            ->orderBy('id_matkul','desc')
            ->get();

        //tampil data matkul
        $prodi = DB::table('prodi')
            ->orderBy('id_prodi','desc')
            ->get();

        //tampil data pembimbing
        $pembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->get();

        //tampil data pembimbing
        $penunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->get();
        
        //tampil data penelitian
        $penelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penelitian','desc')
            ->get();

        //tampil data pengabdian
        $pengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pengabdian','desc')
            ->get();

        // grab data from database
        //return $print;
        return view('admin/sgas_detail',['detail_sgas' => $detail_sgas, 'ngecek'=> $ngecek, 'items'=> $items, 'matkul'=> $matkul, 
        'prodi' => $prodi, 'print' => $print, 'pembimbing' => $pembimbing, 
        'penunjang' => $penunjang,'penelitian' => $penelitian,'pengabdian' => $pengabdian  ]);
    }

    public function loadDataKode($id=0)
    {
    	$data = DB::table('matkul')
            ->where('kode_matkul', $id)->first();
    	return response()->json($data);
    }

    public function loadDataNama($id=0)
    {
    	$data = DB::table('matkul')
            ->where('nama_matkul', $id)->first();

    	return response()->json($data);
    }

    public function store(Request $request){

        //cek teori sks
        $cektsks = DB::table('detail_sgas')
                        //->select('detail_sgas.total')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('prodi','prodi.nama_prodi','=','detail_sgas.prodi')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        ->where('detail_sgas.kode_matkul','=',$request->kode_matkul)
                        ->where('ta.id_ta','=',$request->ta)
                        ->where('sgas.semester','=',$request->semesterr)
                        //->get();
                        ->sum('tsks'); //2

        $cektsks2 = DB::table('matkul')
                        ->where('kode_matkul','=',$request->kode_matkul)
                        ->value('t'); //4

        $total = $cektsks2 - $cektsks; //2
        
        //cek praktek sks
        $cekpsks = DB::table('detail_sgas')
                        //->select('detail_sgas.total')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('prodi','prodi.nama_prodi','=','detail_sgas.prodi')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        ->where('detail_sgas.kode_matkul','=',$request->kode_matkul)
                        ->where('ta.id_ta','=',$request->ta)
                        ->where('sgas.semester','=',$request->semesterr)
                        // ->get();
                        ->sum('psks'); //2

        $cekpsks2 = DB::table('matkul')
                        ->where('kode_matkul','=',$request->kode_matkul)
                        ->value('p'); //4

        $total2 = $cekpsks2 - $cekpsks; //2

        //cek klinik sks
        $cekksks = DB::table('detail_sgas')
                        //->select('detail_sgas.total')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('prodi','prodi.nama_prodi','=','detail_sgas.prodi')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        ->where('detail_sgas.kode_matkul','=',$request->kode_matkul)
                        ->where('ta.id_ta','=',$request->ta)
                        ->where('sgas.semester','=',$request->semesterr)
                        // ->get();
                        ->sum('ksks'); //2

        $cekksks2 = DB::table('matkul')
                        ->where('kode_matkul','=',$request->kode_matkul)
                        ->value('k'); //4

        $total3 = $cekksks2 - $cekksks; //2

        if ($total >= $request->teori and $total2 >= $request->praktek and $total3 >= $request->klinik) {

            //hitung grandtotal
            $grandtotal = ($request->kelas) * ($request->total);
            
            DB::table('detail_sgas')->insert([
                'id_sgas' => $request->id_sgas,
                'kode_matkul' => $request->kode_matkul,
                'semesterd' => $request->semester,
                'prodi' => $request->prodi,
                'kelas' => $request->kelas,
                'tsks' => $request->teori,
                'psks' => $request->praktek,
                'ksks' => $request->klinik,
                'total' => $request->total,
                'grandtotal' => $grandtotal,

    
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
                
            // return $grandtotal;
            return redirect()->back();

        }else{

            return redirect()->back()->with('error','Data Melebihi SKS yang Tersedia!');

        }

        
    }

    public function storepembimbing(Request $request){

            
            DB::table('detail_pembimbingan')->insert([
                'id_sgas' => $request->id_sgas,
                'jenis_kegiatan' => $request->jenis_kegiatan,
                'sks' => $request->sks,
                'masa_penugasan' => $request->masa_penugasan,
                    
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
                
            // return $grandtotal;
            return redirect()->back();

    }

    public function storepenunjang(Request $request){

            
        DB::table('detail_penunjang')->insert([
            'id_sgas' => $request->id_sgas,
            'jenis_kegiatan' => $request->jenis_kegiatanp,
            'sks' => $request->skspenunjang,
            'masa_penugasan' => $request->masa_penugasanp,
                
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            
        // return $grandtotal;
        return redirect()->back();

    }

    public function storepenelitian(Request $request){

            
        DB::table('detail_penelitian')->insert([
            'id_sgas' => $request->id_sgas,
            'jenis_penelitian' => $request->jenis_kegiatanp,
            'sks' => $request->skspenunjang,
            'masa_penugasan' => $request->masa_penugasanp,
                
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            
        // return $grandtotal;
        return redirect()->back();

    }

    public function storepengabdian(Request $request){

            
        DB::table('detail_pengabdian')->insert([
            'id_sgas' => $request->id_sgas,
            'jenis_pengabdian' => $request->jenis_kegiatanp,
            'sks' => $request->skspenunjang,
            'masa_penugasan' => $request->masa_penugasanp,
                
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            
        // return $grandtotal;
        return redirect()->back();

    }

    public function hapus($id){

        DB::table('detail_sgas')->where('id_detailsgas',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspembimbing($id){

        DB::table('detail_pembimbingan')->where('id_pembimbingan',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspenunjang($id){

        DB::table('detail_penunjang')->where('id_penunjang',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspenelitian($id){

        DB::table('detail_penelitian')->where('id_penelitian',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspengabdian($id){

        DB::table('detail_pengabdian')->where('id_pengabdian',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function generateInvoice($id){
    
        $tampil = DB::table('detail_sgas')
            ->select('sgas.semester','ta.ta','dosen.nama','dosen.jabatan','dosen.jabatan_fungsional','dosen.nidn','ta.tglgjl','ta.tglgnp','sgas.no_plot',
                DB::raw("GROUP_CONCAT(detail_sgas.prodi) as prodi"))
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta') 
            ->where('sgas.id_sgas','=',$id)
            ->orderBy('sgas.id_sgas','desc')
            // ->limit(1)
            ->get();
        
        //dd($tampil);
        
        $invoice = DB::table('detail_sgas')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta') 
            ->where('sgas.id_sgas','=',$id)
            ->orderBy('sgas.id_sgas','desc')
            ->get();
        
        $total = DB::table('detail_sgas')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('grandtotal');
            // ->get();
        
        $totalpembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');
        
        $totalpenunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');
        
        $totalpenelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');
        
        $totalpengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');

        $pembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->get();

        $penunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->get();
        
        $penelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penelitian','desc')
            ->get();
        
        $pengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pengabdian','desc')
            ->get();
        
        $invoicecount = DB::table('detail_sgas')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta') 
            ->where('sgas.id_sgas','=',$id)
            ->orderBy('sgas.id_sgas','desc')
            ->count();

        $pembimbingcount = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->count();
        
        $penunjangcount = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->count();
        
        // menghitung banyak record untuk print maks 7
        $counttotal = $invoicecount + $pembimbingcount + $penunjangcount;

        // dd($counttotal);

        return view('report/print',['invoice' => $invoice, 'tampil' => $tampil, 
        'total' => $total, 'pembimbing' => $pembimbing, 'penunjang' => $penunjang,
        'penelitian' => $penelitian, 'pengabdian' => $pengabdian, 'totalpengabdian' => $totalpengabdian,
        'totalpenelitian' => $totalpenelitian,
        'totalpembimbing' => $totalpembimbing, 'totalpenunjang' => $totalpenunjang,
        'counttotal' => $counttotal]);
    }

    public function generateInvoice2($id){
    
        $tampil = DB::table('detail_sgas')
            ->select('sgas.semester','ta.ta','dosen.nama','dosen.jabatan','dosen.jabatan_fungsional','dosen.nidn','ta.tglgjl','ta.tglgnp','sgas.no_plot',
                DB::raw("GROUP_CONCAT(detail_sgas.prodi) as prodi"))
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta') 
            ->where('sgas.id_sgas','=',$id)
            ->orderBy('sgas.id_sgas','desc')
            // ->limit(1)
            ->get();
        
        //dd($tampil);
        
        $invoice = DB::table('detail_sgas')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta') 
            ->where('sgas.id_sgas','=',$id)
            ->orderBy('sgas.id_sgas','desc')
            ->get();
        
        $total = DB::table('detail_sgas')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('grandtotal');
            // ->get();
        
        $totalpembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');
        
        $totalpenunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');
        
        $totalpenelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');
        
        $totalpengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->sum('sks');

        $pembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->get();

        $penunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->get();
        
        $penelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penelitian','desc')
            ->get();
        
        $pengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pengabdian','desc')
            ->get();
        
        $invoicecount = DB::table('detail_sgas')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->join('ta','ta.id_ta','=','sgas.ta') 
            ->where('sgas.id_sgas','=',$id)
            ->orderBy('sgas.id_sgas','desc')
            ->count();

        $pembimbingcount = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->count();
        
        $penunjangcount = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->count();
        
        // menghitung banyak record untuk print maks 7
        $counttotal = $invoicecount + $pembimbingcount + $penunjangcount;

        // dd($counttotal);

        return view('report/print2',['invoice' => $invoice, 'tampil' => $tampil, 
        'total' => $total, 'pembimbing' => $pembimbing, 'penunjang' => $penunjang,
        'penelitian' => $penelitian, 'pengabdian' => $pengabdian, 'totalpengabdian' => $totalpengabdian,
        'totalpenelitian' => $totalpenelitian,
        'totalpembimbing' => $totalpembimbing, 'totalpenunjang' => $totalpenunjang,
        'counttotal' => $counttotal]);
    }

    public function validasi($validasi){
        
        $cekvalidasi = DB::table('sgas')
                        ->where('id_sgas','=',$validasi)
                        ->value('validasi');
        
        if($cekvalidasi == 0){
            
            DB::table('sgas')->where('id_sgas',$validasi)->update([
                'validasi' => '1',
                'updated_at' => \Carbon\Carbon::now()
                ]);
        }else{
            
            DB::table('sgas')->where('id_sgas',$validasi)->update([
                'validasi' => '0',
                'updated_at' => \Carbon\Carbon::now()
                ]);
        }


        //return $cekvalidasi;
        return redirect('/sgas');
    }


    ///////////////////////// ROLE ADMIN/PRODI \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function indexadmin($id){

        //tampil di tabel
        $detail_sgas = DB::table('detail_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
            ->where('detail_sgas.id_sgas','=',$id)
            ->where('prodi','=',Auth::user()->prodi)
            ->orderBy('id_detailsgas','desc')
            ->get();

        //ngecek validasi & semester (ganjil/genap)
        $ngecek = DB::table('sgas')
            ->where('id_sgas','=',$id)
            //->where('prodi','=',Auth::user()->prodi)
            ->orderBy('id_sgas','desc')
            ->get();

        //untuk print
        $print = DB::table('detail_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->where('id_sgas','=',$id)
            ->limit(1)
            ->get();

        //tampil keterangan dosen
        $items = DB::table('sgas')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->where('id_sgas','=',$id)
            ->orderBy('id_sgas','desc')
            ->get();
        
        //tampil data matkul
        $matkul = DB::table('matkul')
            ->join('users','users.prodi','=','matkul.prodii')
            ->where('users.prodi','=', Auth::user()->prodi)
            ->orderBy('id_matkul','desc')
            ->get();

        //tampil data prodi
        $prodi = DB::table('prodi')
            ->orderBy('id_prodi','desc')
            ->get();

        //tampil data pembimbing
        $pembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->get();

        //tampil data pembimbing
        $penunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->get();
        
        //tampil data penelitian
        $penelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penelitian','desc')
            ->get();

        //tampil data pengabdian
        $pengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pengabdian','desc')
            ->get();

        // grab data from database
        //return $ngecek;
        return view('prodi/sgas_detail',['detail_sgas' => $detail_sgas, 
                'ngecek'=> $ngecek, 'items'=> $items, 'matkul'=> $matkul, 
                'prodi' => $prodi, 'print' => $print, 'pembimbing' => $pembimbing,
                'penunjang' => $penunjang, 'penelitian' => $penelitian, 'pengabdian' => $pengabdian ]);
    }

    public function storeadmin(Request $request){
        
        //cek teori sks
        $cektsks = DB::table('detail_sgas')
                        //->select('detail_sgas.total')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('prodi','prodi.nama_prodi','=','detail_sgas.prodi')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        ->where('detail_sgas.kode_matkul','=',$request->kode_matkul)
                        ->where('ta.id_ta','=',$request->ta)
                        ->where('sgas.semester','=',$request->semesterr)
                        // ->get();
                        ->sum('tsks'); //2

        $cektsks2 = DB::table('matkul')
                        ->where('kode_matkul','=',$request->kode_matkul)
                        ->value('t'); //4

        $total = $cektsks2 - $cektsks; //2
        
        //cek praktek sks
        $cekpsks = DB::table('detail_sgas')
                        //->select('detail_sgas.total')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('prodi','prodi.nama_prodi','=','detail_sgas.prodi')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        ->where('detail_sgas.kode_matkul','=',$request->kode_matkul)
                        ->where('ta.id_ta','=',$request->ta)
                        ->where('sgas.semester','=',$request->semesterr)
                        // ->get();
                        ->sum('psks'); //2

        $cekpsks2 = DB::table('matkul')
                        ->where('kode_matkul','=',$request->kode_matkul)
                        ->value('p'); //4

        $total2 = $cekpsks2 - $cekpsks; //2

        //cek klinik sks
        $cekksks = DB::table('detail_sgas')
                        //->select('detail_sgas.total')
                        ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
                        ->join('prodi','prodi.nama_prodi','=','detail_sgas.prodi')
                        ->join('sgas','sgas.id_sgas','=','detail_sgas.id_sgas')
                        ->join('ta','ta.id_ta','=','sgas.ta')
                        ->where('detail_sgas.kode_matkul','=',$request->kode_matkul)
                        ->where('ta.id_ta','=',$request->ta)
                        ->where('sgas.semester','=',$request->semesterr)
                        // ->get();
                        ->sum('ksks'); //2

        $cekksks2 = DB::table('matkul')
                        ->where('kode_matkul','=',$request->kode_matkul)
                        ->value('k'); //4

        $total3 = $cekksks2 - $cekksks; //2

        //proses

        if ($total >= $request->teori and $total2 >= $request->praktek and $total3 >= $request->klinik) {

            //hitung grandtotal
            $grandtotal = ($request->kelas) * ($request->total);
            
            DB::table('detail_sgas')->insert([
                'id_sgas' => $request->id_sgas,
                'kode_matkul' => $request->kode_matkul,
                'semesterd' => $request->semester,
                'prodi' => $request->prodi,
                'kelas' => $request->kelas,
                'tsks' => $request->teori,
                'psks' => $request->praktek,
                'ksks' => $request->klinik,
                'total' => $request->total,
                'grandtotal' => $grandtotal,
    
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
    
            return redirect()->back();

        }else{

            return redirect()->back()->with('error','Data Melebihi SKS yang Tersedia!');

        }
    }

    public function storepembimbingadmin(Request $request){

        DB::table('detail_pembimbingan')->insert([
            'id_sgas' => $request->id_sgas,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'sks' => $request->sks,
            'masa_penugasan' => $request->masa_penugasan,
                
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            
        // return $grandtotal;
        return redirect()->back();

    }

    public function storepenunjangadmin(Request $request){

        
        DB::table('detail_penunjang') -> insert([
            'id_sgas' => $request->id_sgas,
            'jenis_kegiatan' => $request->jenis_kegiatanp,
            'sks' => $request->skspenunjang,
            'masa_penugasan' => $request->masa_penugasanp,

            'created_at' => \Carbon\ Carbon::now(),
            'updated_at' => \Carbon\ Carbon::now()
        ]);
        
        // return $grandtotal;
        return redirect()->back();

    }

    public function storepenelitianadmin(Request $request){

            
        DB::table('detail_penelitian')->insert([
            'id_sgas' => $request->id_sgas,
            'jenis_penelitian' => $request->jenis_kegiatanp,
            'sks' => $request->skspenunjang,
            'masa_penugasan' => $request->masa_penugasanp,
                
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            
        // return $grandtotal;
        return redirect()->back();

    }

    public function storepengabdianadmin(Request $request){

            
        DB::table('detail_pengabdian')->insert([
            'id_sgas' => $request->id_sgas,
            'jenis_pengabdian' => $request->jenis_kegiatanp,
            'sks' => $request->skspenunjang,
            'masa_penugasan' => $request->masa_penugasanp,
                
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            
        // return $grandtotal;
        return redirect()->back();

    }

    public function hapusadmin($id){

        DB::table('detail_sgas')->where('id_detailsgas',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspembimbingadmin($id){

        DB::table('detail_pembimbingan')->where('id_pembimbingan',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspenunjangadmin($id){

        DB::table('detail_penunjang')->where('id_penunjang',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspenelitianadmin($id){

        DB::table('detail_penelitian')->where('id_penelitian',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    public function hapuspengabdianadmin($id){

        DB::table('detail_pengabdian')->where('id_pengabdian',$id)->delete();
        return back()->with('success','Post deleted successfully');
    }

    //////////////////////////// ROLE USER \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    public function indexuser($id){

        //tampil di tabel
        $detail_sgas = DB::table('detail_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->where('id_sgas','=',$id)
            ->orderBy('id_detailsgas','desc')
            ->get();

        //untuk print
        $print = DB::table('detail_sgas')
            ->join('matkul','matkul.kode_matkul','=','detail_sgas.kode_matkul')
            ->where('id_sgas','=',$id)
            ->limit(1)
            ->get();

        //tampil keterangan dosen
        $items = DB::table('sgas')
            ->join('dosen','dosen.id','=','sgas.id_dosen')
            ->where('id_sgas','=',$id)
            ->orderBy('id_sgas','desc')
            ->get();
        
        //tampil data matkul
        $matkul = DB::table('matkul')
            ->orderBy('id_matkul','desc')
            ->get();

        //tampil data matkul
        $prodi = DB::table('prodi')
            ->orderBy('id_prodi','desc')
            ->get();

        $pembimbing = DB::table('detail_pembimbingan')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pembimbingan','desc')
            ->get();

        $penunjang = DB::table('detail_penunjang')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penunjang','desc')
            ->get();
        
        $penelitian = DB::table('detail_penelitian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_penelitian','desc')
            ->get();
        
        $pengabdian = DB::table('detail_pengabdian')
            ->where('id_sgas','=',$id)
            ->orderBy('id_pengabdian','desc')
            ->get();

        // grab data from database
        //return $print;
        return view('user/sgas_detail',['detail_sgas' => $detail_sgas, 'items'=> $items, 
            'matkul'=> $matkul, 'prodi' => $prodi, 'print' => $print,
            'pembimbing' => $pembimbing, 'penunjang' => $penunjang,
            'penelitian' => $penelitian, 'pengabdian' =>$pengabdian ]);
    }
}

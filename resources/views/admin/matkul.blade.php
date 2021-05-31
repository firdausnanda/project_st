@extends('layouts.app')

@section('sidebar')
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/admin" aria-expanded="false"
                    class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading" style="margin-left: 3px;;"><span>Master</span></div>
            </li>

            <li class="menu">
                <a href="/dosen" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Dosen</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="/matkul" data-active="true" aria-expanded="true" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Mata Kuliah</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="/prodii" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-codesandbox"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline><polyline points="7.5 19.79 7.5 14.6 3 12"></polyline><polyline points="21 12 16.5 14.6 16.5 19.79"></polyline><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>                        
                        <span>Program Studi</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="/ta" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                        <span>Tahun Akademik</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="/akun" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Akun</span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading" style="margin-left: 3px;;"><span>Transaction</span></div>
            </li>

            <li class="menu">
                <a href="/sgas" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                        <rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line>
                        <line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line>
                        <line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line>
                        <line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line>
                        <line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Input SGAS</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="/tracking" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        <span>Data Tracking</span>
                    </div>
                </a>
            </li>

        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
@endsection

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Data Mata Kuliah</h4>
                </div>

                <div style="margin-top: 20px; margin-bottom: -25px;">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataMatkul"><i class="far fa-edit"></i>Add Data</button>
                    <div class="card component-card_1" style="width:50%;">
                        <div class="card-body">
                            <div class="card-title"><span style="color: red;">*</span> <b>Catatan</b></div>
                            <table>
                                <tr>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        Awalan Kode Matkul :
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        191 Prodi DIII Keperawatan
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        197 Prodi Profesi Bidan
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        192 Prodi DIII Kebidanan
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        195 Prodi DIII Rekam Medis
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        193 Prodi DIII Akupunktur
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        209 Prodi S1 Farmasi
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        194 Prodi DIII Farmasi
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        2010 Prodi S1 Informatika
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        196 Prodi DIV Kebidanan
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        208 Prodi S1 Fisioterapi
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- menampilkan error validasi --}}
                @if (count($errors) > 0)
                <div class="alert alert-danger" style="margin-top: 25px; margin-bottom: -20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matkul</th>
                                <th style="width: 35%;">Mata Kuliah</th>
                                <th>SKS</th>
                                <th>T</th>
                                <th>P</th>
                                <th>K</th>
                                <th>Kurikulum</th>
                                <th>PJMK</th>
                                <th class="no-content" style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($matkul as $m)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td style="font-size: 11px;">{{ $m->kode_matkul }}</td>
                                <td style="font-size: 12px;">{{ $m->nama_matkul }}</td>
                                <td>{{ $m->sks }}</td>
                                <td>{{ $m->t }}</td>
                                <td>{{ $m->p }}</td>
                                <td>{{ $m->k }}</td>
                                <td>{{ $m->kurikulum }}</td>
                                @if ($m->nama_dosen == "")
                                <td>-</td>                                   
                                @else
                                <td>{{ $m->nama_dosen }}</td>                                    
                                @endif
                                <td class="row">
                                    <button class="edit-button btn btn-primary mb-2 modal-show"  
                                    data-toggle="modal" data-target="#EditDataMatkul" 
                                    data-kode_matkul="{{ $m->kode_matkul }}" 
                                    data-nama_matkul="{{ $m->nama_matkul }}" 
                                    data-sks="{{ $m->sks }}"
                                    data-tsks="{{ $m->t }}"
                                    data-psks="{{ $m->p }}"
                                    data-ksks="{{ $m->k }}"
                                    data-kurikulum="{{ $m->kurikulum }}"
                                    data-pjmk="{{ $m->nama_dosen }}"
                                    data-prodi="{{ $m->prodii }}"><i class="far fa-edit"></i></button>
                                    
                                    <form action="{{url('matkul/hapus/'.$m->id_matkul)}}" method="GET">
                                        <div class="right gap-items-2">
                                            <button class="btn btn-xs btn-danger submitForm" name="archive" type="submit" id="submitForm" ><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matkul</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>T</th>
                                <th>P</th>
                                <th>K</th>
                                <th>Kurikulum</th>
                                <th>PJMK</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- Modal Tambah Data --}}
<div class="modal fade fadeinUp" id="TambahDataMatkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/matkul/store" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="nidn">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
                </div>
                <div class="form-group mb-4">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <textarea name="nama_matkul" id="nama-matkul" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">SKS</label>
                    <input type="text" name="sks" id="sks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Teori (T)</label>
                    <input type="text" name="tsks" id="tsks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Praktek (P)</label>
                    <input type="text" name="psks" id="psks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Klinis (K)</label>
                    <input type="text" name="ksks" id="ksks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="kurikulum">Kurikulum</label>
                    <input type="text" name="kurikulum" id="kurikulum" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="pjmk">PJMK</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="pjmk" name="pjmk"> 
                        <option value="-">-</option>
                        @foreach($dosen as $mat)
                        <option value="{{ $mat->nama }}">{{ $mat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="prodi">Prodi</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="prodi" name="prodi" required> 
                        <option value="-">-</option>
                        @foreach($prodi as $prod)
                        <option value="{{ $prod->nama_prodi }}">{{ $prod->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Data --}}
<div class="modal fade fadeinUp" id="EditDataMatkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/matkul/update" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" readonly>
                </div>
                <div class="form-group mb-4">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <textarea name="nama_matkul" id="nama_matkul" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">SKS</label>
                    <input type="text" name="sks" id="sks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Teori (T)</label>
                    <input type="text" name="tsks" id="tsks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Praktek (P)</label>
                    <input type="text" name="psks" id="psks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Klinis (K)</label>
                    <input type="text" name="ksks" id="ksks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="kurikulum">Kurikulum</label>
                    <input type="text" name="kurikulum" id="kurikulum" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="pjmk">PJMK</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="pjmk" name="pjmk"> 
                        <option value="-">-</option>
                        @foreach($dosen as $mat)
                        <option value="{{ $mat->nama }}">{{ $mat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="prodi">Prodi</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="prodi" name="prodi"> 
                        <option value="-">-</option>
                        @foreach($prodi as $prod)
                        <option value="{{ $prod->nama_prodi }}">{{ $prod->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Edit">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

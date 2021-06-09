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
                <a href="/matkul" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">
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
                <a href="/tracking" data-active="true" aria-expanded="true" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        <span>Data Tracking</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>Report</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="elements" data-parent="#accordionExample" style="">
                    <li>
                        <a href="#" style="text-decoration: none;">Rekap Matakuliah</a>
                    </li>
                    <li>
                        <a href="#" style="text-decoration: none;">Rekap Dosen</a>
                    </li>
                    <li>
                        <a href="#" style="text-decoration: none;">Rekap Pembimbingan</a>
                    </li>
                    <li>
                        <a href="#" style="text-decoration: none;">Rekap Penunjang</a>
                    </li>
                    <li>
                        <a href="#" style="text-decoration: none;">Rekap Dosen Total</a>
                    </li>
                </ul>
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
                    <h4 style="font-weight: bold;">Data Tracking</h4>
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

                <div class="toggle-list">
                    {{-- <a class="btn toggle-vis mt-3 ml-2" data-column="1">Kode Matakuliah</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="2">Matakuliah</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="3">Prodi</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="4">Semester(1)</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="5">Semester(2)</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="6">Nama Dosen</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="7">TA</a>
                    <a class="btn toggle-vis mt-3 ml-2" data-column="8">Kurikulum</a> --}}
                    <div class="btn-group dropright mt-3 ml-2" role="group">
                        <button id="btnDropRight" type="button" class="btn btn-secondary dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Columns Visibility</button>
                        <div class="dropdown-menu" aria-labelledby="btnDropRight">
                            {{-- <a href="javascript:void(0);" class="dropdown-item">Action</a> --}}
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="1">Kode Matakuliah</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="2">Matakuliah</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="3">Prodi</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="4">Semester(1)</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="5">Semester(2)</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="6">Nama Dosen</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="7">Status</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="8">TA</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="9">Kurikulum</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="10">SKS</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="11">Kelas</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="12">SKS Terisi</a>
                            <a class=" toggle-vis mt-3 ml-2 dropdown-item" data-column="13">Total</a>
                        </div>
                    </div>
                </div>

                

                <div class="table-responsive mb-4 mt-4">
                    <table id="tabel-cari" class="table table-hover" style="width:100%">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Matakuliah</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Semester</th>
                                <th style="width: 15%;">Nama Dosen</th>
                                <th>Status</th>
                                <th>TA</th>
                                <th>Kurikulum</th>
                                <th>SKS</th>
                                <th>Kelas</th>
                                <th>SKS Terisi</th>
                                <th style="width:70px;">Total</th>
                                <th class="no-content" style="width: 15%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($tracking as $d)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $d->kode_matkul }}</td>
                                <td style="font-size: 12px;">{{ $d->nama_matkul }}</td>
                                <td>{{ $d->prodi }}</td>
                                <td>{{ $d->semesterd }}</td>
                                <td>{{ ucfirst($d->semester) }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->status }}</td>
                                <td>{{ $d->ta }}</td>
                                <td>{{ $d->kurikulum }}</td>
                                <td>{{ $d->sks }}</td>
                                <td>{{ $d->kelas }}</td>
                                <td>{{ $d->total }} ({{ $d->tsks }}T, {{ $d->psks }}P, {{ $d->ksks }}K)</td>
                                <td>{{ $d->grandtotal }}</td>
                                <td class="row">
                                    <a href="/sgas/detail/{{ $d->id_sgas }}" style="margin-bottom: 3px;"><button class="btn btn-xs btn-primary"><i class="far fa-eye"></i></button></a> 
                                    <form action="{{url('tracking/hapus/'.$d->id_detailsgas)}}" method="GET">
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
                                <th class="invisible"></th>
                                <th>Kode Matakuliah</th>
                                <th>Matakuliah</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Semester</th>
                                <th>Nama Dosen</th>
                                <th>Status</th>
                                <th>TA</th>
                                <th>Kurikulum</th>
                                <th>SKS</th>
                                <th>Kelas</th>
                                <th>SKS Terisi</th>
                                <th>Total</th>
                                <th class="invisible"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
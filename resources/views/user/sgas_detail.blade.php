@extends('layouts.app')

@section('sidebar')
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/user" aria-expanded="false"
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
                <div class="heading" style="margin-left: 3px;;"><span>Transaction</span></div>
            </li>

            <li class="menu">
                <a href="/cetak" data-active="true" aria-expanded="true" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                        <rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line>
                        <line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line>
                        <line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line>
                        <line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line>
                        <line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Cetak Data</span>
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
                    <h4 style="font-weight: bold;">Cetak Data</h4>
                </div>

                @foreach($items as $item)
                <div class="container mt-4">
                    <div class="row justify-content-md-center">
                        <div class="col-6 col-md-4"><label>Nama yang diberi tugas</label></div>
                        <div class="col-12 col-md-8" style="font-weight:bold;">{{ $item->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4"><label>Jabatan</label></div>
                        <div class="col-12 col-md-8">{{ $item->jabatan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4"><label>Jabatan Fungsional</label></div>
                        <div class="col-12 col-md-8">{{ $item->jabatan_fungsional }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4"><label>NRP / NIP / NIK / NIDN / NIDK</label></div>
                        <div class="col-12 col-md-8">{{ $item->nidn }}</div>
                    </div>
                </div>
                @endforeach


                <div style="margin-top: 20px; margin-bottom: -25px;">
                    {{-- button print --}}
                    @foreach ($print as $i)
                    <a href="{{ route('invoiceUser', $i->id_sgas) }}" target="_blank"><button class="btn btn-success mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                    Print
                    </button></a>
                    @endforeach
                </div>

                {{-- menampilkan error validasi --}}
               @if ($error = Session::get('error'))
               <div class="alert alert-icon-left alert-light-danger mb-4 alert-dismissible fade show" role="alert" style="margin-top:25px;">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                   </button>
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                   <strong>Error!</strong> {{ $error }}
               </div>
               @endif

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matkul</th>
                                <th>Matakuliah</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Kelas</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($detail_sgas as $m)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $m->kode_matkul }}</td>
                                <td>{{ $m->nama_matkul }}</td>
                                <td>{{ $m->prodi }}</td>
                                <td>{{ $m->semesterd }}</td>
                                <td>{{ $m->kelas }}</td>
                                <td>{{ $m->total }} ({{ $m->tsks }}T, {{ $m->psks }}P, {{ $m->ksks }}K)</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matkul</th>
                                <th>Matakuliah</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Kelas</th>
                                <th>SKS</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

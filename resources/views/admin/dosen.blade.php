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
                <a href="/dosen" data-active="true" aria-expanded="true" class="dropdown-toggle" style="text-decoration: none;">
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
                    <h4 style="font-weight: bold;">Data Dosen</h4>
                </div>

                <div style="margin-top: 20px; margin-bottom: -25px;">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataDosen"><i class="far fa-edit"></i>Add Data</button>
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
                            <tr align="center">
                                <th>No</th>
                                {{-- <th>NRP/NIP/NIK</th> --}}
                                <th>NRP/NIP/NIK NIDN/NIDK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Status</th>
                                <th class="no-content" style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($dosen as $d)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                {{-- <td style="font-size: 10px;">{{ $d->nik }}</td> --}}
                                <td style="font-size: 11px;">{{ $d->nidn }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->jabatan }}</td>
                                @if ($d->jabatan_fungsional == "")
                                <td>-</td>                                   
                                @else
                                <td>{{ $d->jabatan_fungsional }}</td>                                    
                                @endif
                                <td>{{ $d->status }}</td>
                                <td class="row">
                                    <button class="edit-button btn btn-primary mb-2 modal-show"  data-toggle="modal" data-target="#EditDataDosen" data-id="{{ $d->id }}" data-nidn="{{ $d->nidn }}" data-nama="{{ $d->nama }}" data-jabatan="{{ $d->jabatan }}" data-jabatann="{{ $d->jabatan_fungsional }}" data-status="{{ $d->status }}"><i class="far fa-edit"></i></button>
                                    
                                    <form action="{{url('dosen/hapus/'.$d->id)}}" method="GET">
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
                                {{-- <th>NRP/NIP/NIK</th> --}}
                                <th>NRP/NIP/NIK NIDN/NIDK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Status</th>
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
<div class="modal fade fadeinUp" id="TambahDataDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/dosen/store" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="nidn">NRP / NIP / NIK / NIDN / NIDK</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" required>
                </div>
                <div class="form-group mb-4">
                    <label for="nama">Nama Lengkap</label>
                    <textarea name="nama" id="nama" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="jabatan">Jabatan</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="jabatan" name="jabatan" required>
                        @foreach($prodi as $i)
                        <option value="Dosen {{ $i->nama_prodi }}">Dosen {{ $i->nama_prodi }}</option>
                        @endforeach
                        {{-- <option value="Dosen D3 Keperawatan">Dosen D3 Keperawatan</option>
                        <option value="Dosen D3 Kebidanan">Dosen D3 Kebidanan</option>
                        <option value="Dosen D3 Akupunktur">Dosen D3 Akupunktur</option> --}}
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="jabatan_fungsional">Jabatan Fungsional</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="jabatan_fungsional" name="jabatan_fungsional">
                        <option value="Asisten Ahli">Asisten Ahli</option>
                        <option value="Lektor">Lektor</option>
                        <option value="Lektor Kepala">Lektor Kepala</option>
                        <option value="Guru Besar">Guru Besar</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="status">Status</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="status" name="status">
                        <option value="Tetap">Tetap</option>
                        <option value="Tidak Tetap">Tidak Tetap</option>
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
<div class="modal fade fadeinUp" id="EditDataDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/dosen/update" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                {{-- <div class="form-group mb-4">
                    <label for="nik">NRP / NIP / NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" readonly>
                </div> --}}
                <div class="form-group mb-4">
                    <label for="nidn">NRP / NIP / NIK / NIDN / NIDK</label>
                    <input type="text" class="form-control" id="nidn" name="nidn">
                </div>
                <div class="form-group mb-4">
                    <label for="nama">Nama Lengkap</label>
                    <textarea name="nama" id="nama" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="jabatan">Jabatan</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="jabatan" name="jabatan">
                        @foreach($prodi as $i)
                        <option value="Dosen {{ $i->nama_prodi }}">Dosen {{ $i->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="jabatan_fungsional">Jabatan Fungsional</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="jabatan_fungsional" name="jabatan_fungsional">
                        <option value="-">-</option>
                        <option value="Asisten Ahli">Asisten Ahli</option>
                        <option value="Lektor">Lektor</option>
                        <option value="Lektor Kepala">Lektor Kepala</option>
                        <option value="Guru Besar">Guru Besar</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="status">Status</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="status" name="status">
                        <option value="0">-</option>
                        <option value="Tetap">Tetap</option>
                        <option value="Tidak Tetap">Tidak Tetap</option>
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

@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Data Detail SGAS</h4>
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
                        <div class="col-6 col-md-4"><label style="font-size: 12px;">NRP / NIP / NIK / NIDN / NIDK</label></div>
                        <div class="col-12 col-md-8">{{ $item->nidn }}</div>
                    </div>
                </div>
                @endforeach

                {{-- menampilkan error validasi --}}
                @if ($error = Session::get('error'))
                <div class="alert alert-icon-left alert-light-danger mb-4 alert-dismissible fade show" role="alert"
                    style="margin-top:25px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-alert-triangle">
                        <path
                            d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                        </path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12" y2="17"></line>
                    </svg>
                    <strong>Error!</strong> {{ $error }}
                </div>
                @endif

                {{-- Button Validasi & Print --}}
                <div style="margin-top: 20px; margin-bottom: -10px;">
                    {{-- button print --}}
                    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#PrintDetail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                    Print
                    </button>
                    {{-- button validasi admin --}}
                    @foreach ($items as $ds)
                    @if($ds->validasi =='0')
                    <a href="{{ route('validasi', $ds->id_sgas) }}">
                        <button class="btn btn-info mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-check">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Validasi
                        </button>
                    </a>
                    @elseif($ds->validasi =='1')
                    <a href="{{ route('validasi', $ds->id_sgas) }}">
                        <button class="btn btn-danger mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        Batal Validasi
                        </button>
                    </a>
                    @endif
                    @endforeach
                </div>

                <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#border-top-home"
                            role="tab" aria-controls="border-top-home" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file-text">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                            Pengajaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile"
                            role="tab" aria-controls="border-top-profile" aria-selected="false"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Pembimbingan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#border-top-contact"
                            role="tab" aria-controls="border-top-contact" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-tag">
                                <path
                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                </path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                            Penunjang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-top-penelitian-tab" data-toggle="tab" href="#border-top-penelitian"
                            role="tab" aria-controls="border-top-penelitian" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-archive">
                                <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                <rect x="1" y="3" width="22" height="5"></rect>
                                <line x1="10" y1="12" x2="14" y2="12"></line>
                            </svg>
                            Penelitian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-top-pengabdian-tab" data-toggle="tab" href="#border-top-pengabdian"
                            role="tab" aria-controls="border-top-pengabdian" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-book">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                            </svg>
                            Pengabdian
                        </a>
                    </li>
                </ul>
                     
                <div class="tab-content" id="borderTopContent">
                    {{-- Data Pengajaran --}}
                    <div class="tab-pane fade show active" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                        {{-- Tambah Data --}}
                        <div style="margin-top: 20px; margin-bottom: -25px; margin-left: 10px;">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataDetail"><i class="far fa-edit"></i>Add Data</button>
                        </div>
                        {{-- Tabel Pengajaran --}}
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
                                        <th>Total</th>
                                        <th class="no-content"></th>
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
                                        <td>{{ $m->grandtotal }}</td>
                                        <td class="row">
                                            {{-- <button class="edit-button btn btn-primary mb-2 modal-show"  
                                            data-toggle="modal" data-target="#EditDataSgas" 
                                            data-nidnn="{{ $m->nidn }}" 
                                            data-namaa="{{ $m->nama }}" data-jabatann="{{ $m->jabatan }}" 
                                            data-ta="{{ $m->ta }}" data-semester="{{ $m->semester }}"><i class="far fa-edit"></i></button> --}}
                                            
                                            <form action="{{url('detail/hapus/'.$m->id_detailsgas)}}" method="GET">
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
                                        <th>Matakuliah</th>
                                        <th>Prodi</th>
                                        <th>Semester</th>
                                        <th>Kelas</th>
                                        <th>SKS</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Data Pembimbingan --}}
                    <div class="tab-pane fade" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">
                        {{-- Tambah Data --}}
                        <div style="margin-top: 20px; margin-bottom: -25px; margin-left: 10px;">
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataPembimbing"><i
                                    class="far fa-edit"></i>Add Data</button>
                        </div>
                        {{-- Tabel Pembimbingan --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-pembimbingan" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($pembimbing as $pem)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pem->jenis_kegiatan }}</td>
                                        <td>{{ $pem->sks }}</td>
                                        <td>{{ $pem->masa_penugasan }}</td>
                                        <td class="row">
                                            {{-- <button class="edit-button btn btn-primary mb-2 modal-show"  
                                            data-toggle="modal" data-target="#EditDataSgas" 
                                            data-nidnn="{{ $m->nidn }}"
                                            data-namaa="{{ $m->nama }}" data-jabatann="{{ $m->jabatan }}"
                                            data-ta="{{ $m->ta }}" data-semester="{{ $m->semester }}"><i
                                                class="far fa-edit"></i></button> --}}

                                            <form action="{{url('detail/pembimbing/'.$pem->id_pembimbingan)}}" method="GET">
                                                <div class="right gap-items-2">
                                                    <button class="btn btn-xs btn-danger submitForm" name="archive"
                                                        type="submit" id="submitForm"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Data Penunjang --}}
                    <div class="tab-pane fade" id="border-top-contact" role="tabpanel" aria-labelledby="border-top-contact-tab">
                        {{-- Tambah Data --}}
                        <div style="margin-top: 20px; margin-bottom: -25px; margin-left: 10px;">
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataPenunjang"><i
                                    class="far fa-edit"></i>Add Data</button>
                        </div>
                        {{-- Tabel Penunjang --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-penunjang" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($penunjang as $pen)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pen->jenis_kegiatan }}</td>
                                        <td>{{ $pen->sks }}</td>
                                        <td>{{ $pen->masa_penugasan }}</td>
                                        <td class="row">
                                            {{-- <button class="edit-button btn btn-primary mb-2 modal-show"  
                                            data-toggle="modal" data-target="#EditDataSgas" 
                                            data-nidnn="{{ $m->nidn }}"
                                            data-namaa="{{ $m->nama }}" data-jabatann="{{ $m->jabatan }}"
                                            data-ta="{{ $m->ta }}" data-semester="{{ $m->semester }}"><i
                                                class="far fa-edit"></i></button> --}}

                                            <form action="{{url('detail/penunjang/'.$pen->id_penunjang)}}" method="GET">
                                                <div class="right gap-items-2">
                                                    <button class="btn btn-xs btn-danger submitForm" name="archive"
                                                        type="submit" id="submitForm"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Data Penelitian --}}
                    <div class="tab-pane fade" id="border-top-penelitian" role="tabpanel" aria-labelledby="border-top-penelitian-tab">
                        {{-- Tambah Data --}}
                        <div style="margin-top: 20px; margin-bottom: -25px; margin-left: 10px;">
                            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataPenunjang"><i
                                    class="far fa-edit"></i>Add Data</button>
                        </div>
                        {{-- Tabel Penelitian --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-penelitian" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Penelitian</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($penunjang as $pen)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pen->jenis_kegiatan }}</td>
                                        <td>{{ $pen->sks }}</td>
                                        <td>{{ $pen->masa_penugasan }}</td>
                                        <td class="row">
                                            {{-- <button class="edit-button btn btn-primary mb-2 modal-show"  
                                            data-toggle="modal" data-target="#EditDataSgas" 
                                            data-nidnn="{{ $m->nidn }}"
                                            data-namaa="{{ $m->nama }}" data-jabatann="{{ $m->jabatan }}"
                                            data-ta="{{ $m->ta }}" data-semester="{{ $m->semester }}"><i
                                                class="far fa-edit"></i></button> --}}

                                            <form action="{{url('detail/penunjang/'.$pen->id_penunjang)}}" method="GET">
                                                <div class="right gap-items-2">
                                                    <button class="btn btn-xs btn-danger submitForm" name="archive"
                                                        type="submit" id="submitForm"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Penelitian</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>

</div>

{{-- Modal Tambah Data Pengajaran --}}
<div class="modal fade fadeinUp" id="TambahDataDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/sgas/detail/store" method="POST" name="tambah">
            {{ csrf_field() }}
            @foreach($ngecek as $cek)
            <input type="hidden" value="{{ $cek ->ta }}" name="ta" id="ta">
            <input type="hidden" value="{{ $cek ->semester }}" name="semesterr" id="semesterr">
            @endforeach
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="kode_matkul">Kode Matakuliah</label>
                    <input type="text" id="kode_matkul" name="kode_matkul" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="nama_matkul">Nama Matakuliah</label>
                    <select class="selectpicker form-control" data-live-search="true" id="nama_matkul" name="nama_matkul" required>
                        @foreach($matkul as $i)
                        <option value="{{ $i->nama_matkul }}">{{ $i->nama_matkul }}</option>
                        @endforeach
                        <option value="0" selected>-</option>
                    </select>
                </div>        
                <div class="form-group mb-4">
                    <label for="semester">Semester</label>
                    {{-- <input type="text" class="form-control" name="semester" id="semester" readonly> --}}
                    <select class="selectpicker form-control" data-live-search="true" name="semester" id="semester">
                        @foreach($ngecek as $ds)
                        @if ($ds->semester == 'ganjil')
                        <option value="I">I</option>
                        <option value="III">III</option>
                        <option value="V">V</option>
                        <option value="VII">VII</option>
                        @else
                        <option value="II">II</option>
                        <option value="IV">IV</option>
                        <option value="VI">VI</option>
                        <option value="VIII">VIII</option>
                        @endif
                        @endforeach
                        <option value="0" selected>-</option>
                    </select>
                    {{-- <div id="hilang" style="display:none; margin-top: 20px;">
                        <small class="form-text mb-4" style="color: red;">* Jumlah Maksimal Total SKS adalah :
                            <input type="text" name="skss" id="skss"
                                style="border: none; color: red; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small>
                    </div> --}}
                </div>
                <div class="form-group mb-4">
                    <label for="prodi">Prodi</label>
                    <select class="selectpicker form-control" data-live-search="true" id="prodi" name="prodi" required>
                        <option value="0" selected>-</option>
                        @foreach($prodi as $p)
                        <option value="{{ $p->nama_prodi }}">{{ $p->nama_prodi }}</option>
                        @endforeach
                        {{-- <option value="D3 Keperawatan">D3 Keperawatan</option>
                        <option value="D3 Kebidanan">D3 Kebidanan</option>
                        <option value="D3 Akupunktur">D3 Akupunktur</option>
                        <option value="0" selected>-</option> --}}
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="teori">Teori <div style="font-size:12px;"><i>SKS</i></div></label>
                    <input type="number" name="teori" id="teori" class="form-control" onkeyup="sum();" onclick="sum();" step="any" required>
                    <div id="hilangT" style="display:none;">
                        <small class="form-text" style="color: red;">* Jumlah Maksimal SKS Teori adalah :
                            <input type="text" name="skst" id="skst"
                                style="border: none; color: red; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small>
                        {{-- <small class="form-text" style="color: green;">* Jumlah Terisi SKS Teori adalah :
                            <input type="text" name="tskst" id="tskst"
                                style="border: none; color: green; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small> --}}
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="praktek">Praktek <div style="font-size:12px;"><i>SKS</i></div></label>
                    <input type="number" name="praktek" id="praktek" class="form-control" onkeyup="sum();" onclick="sum();" step="any" required>
                    <div id="hilangP" style="display:none;">
                        <small class="form-text" style="color: red;">* Jumlah Maksimal SKS Praktek adalah :
                            <input type="text" name="sksp" id="sksp"
                                style="border: none; color: red; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small>
                        {{-- <small class="form-text" style="color: green;">* Jumlah Terisi SKS Praktek adalah :
                            <input type="text" name="psksp" id="psksp"
                                style="border: none; color: green; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small> --}}
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="klinik">Klinik <div style="font-size:12px;"><i>SKS</i></div></label>
                    <input type="number" name="klinik" id="klinik" class="form-control" onkeyup="sum();" onclick="sum();" step="any" required>
                    <div id="hilangK" style="display:none;">
                        <small class="form-text" style="color: red;">* Jumlah Maksimal SKS Klinik adalah :
                            <input type="text" name="sksk" id="sksk"
                                style="border: none; color: red; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small>
                        {{-- <small class="form-text" style="color: green;">* Jumlah Terisi SKS Teori adalah :
                            <input type="text" name="ksksk" id="ksksk"
                                style="border: none; color: green; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small> --}}
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="teori">Total SKS</label>
                    <input type="number" name="total" id="total" class="form-control" onchange="grandtotalsum();" value="0" readonly>
                    <div id="hilang" style="display:none; margin-top: 20px;">
                        <small class="form-text mb-4" style="color: red;">* Jumlah Maksimal Total SKS adalah :
                            <input type="text" name="skss" id="skss"
                                style="border: none; color: red; width: 15px; font-weight: bold; text-align: center;"
                                readonly>
                        </small>
                    </div>
                </div>
                <div class="form-group mb-4">
                    @foreach($items as $ite)
                    <input type="hidden" name="id_sgas" id="id_sgas" class="form-control" value="{{ $ite->id_sgas }}" readonly>
                    @endforeach
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

{{-- Modal Print --}}
<div class="modal fade fadeinUp" id="PrintDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Print</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            @foreach ($print as $i)
            <a href="{{ route('invoice', $i->id_sgas) }}" target="_blank"><button class="btn btn-success mb-2"
                    style="margin-top:10px;margin-left:10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-printer">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Print + TTD
                </button>
            </a>
            @endforeach
            @foreach ($print as $i)
            <a href="{{ route('invoice2', $i->id_sgas) }}" target="_blank"><button class="btn btn-success mb-2"
                    style="margin-top:10px;margin-left:10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-printer">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>
                    Print
                </button>
            </a>
            @endforeach
        </div>
    </div>
</div>

{{-- Modal Tambah Data Pembimbing --}}
<div class="modal fade fadeinUp" id="TambahDataPembimbing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Pembimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/sgas/detail/storepembimbing" method="POST" name="tambah">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                    <textarea name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required></textarea>    
                </div>
                    
                <div class="form-group mb-4">
                    <label for="sks">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" step="any" required>
                </div>
                <div class="form-group mb-4">
                    <label for="masa_penugasan">Masa Penugasan</label>
                    <input type="text" class="form-control" id="masa_penugasan" name="masa_penugasan" required>
                </div>
                <div class="form-group mb-4">
                    @foreach($items as $ite)
                    <input type="hidden" name="id_sgas" id="id_sgas" class="form-control" value="{{ $ite->id_sgas }}" readonly>
                    @endforeach
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

{{-- Modal Tambah Data Penunjang --}}
<div class="modal fade fadeinUp" id="TambahDataPenunjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Penunjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/sgas/detail/storepenunjang" method="POST" name="tambah">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="jenis_kegiatanp">Jenis Kegiatan</label>
                    <textarea name="jenis_kegiatanp" id="jenis_kegiatanp" class="form-control" required></textarea>    
                </div>
                    
                <div class="form-group mb-4">
                    <label for="sksp">SKS</label>
                    <input type="number" class="form-control" id="skspenunjang" name="skspenunjang" step="any" required>
                </div>
                <div class="form-group mb-4">
                    <label for="masa_penugasanp">Masa Penugasan</label>
                    <input type="text" class="form-control" id="masa_penugasanp" name="masa_penugasanp" required>
                </div>
                <div class="form-group mb-4">
                    @foreach($items as $ite)
                    <input type="hidden" name="id_sgas" id="id_sgas" class="form-control" value="{{ $ite->id_sgas }}" readonly>
                    @endforeach
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

{{-- Modal Edit Data Pengajaran --}}
{{-- <div class="modal fade fadeinUp" id="EditDataSgas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit SGAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/sgas/update" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="namaa">Nama Lengkap</label>
                        <select class="selectpicker form-control" data-live-search="true" id="namaa" name="namaa">
                            @foreach($nama as $i)
                            <option value="{{ $i->nama }}">{{ $i->nama }}</option>
                            @endforeach
                            <option value="0" selected>-</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="nidnn">NIDN</label>
                        <input type="text" name="nidnn" id="nidnn" class="form-control" readonly>
                    </div>
                    <div class="form-group mb-4">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatann" id="jabatann" class="form-control" readonly>
                    </div>
                    <div class="form-group mb-4">
                        <label for="ta">TA</label>
                        <select class="selectpicker form-control" data-live-search="true" id="ta" name="ta">
                            @foreach($items as $item)
                            <option value="{{ $item->ta }}">{{ $item->ta }}</option>
                            @endforeach
                        </select>                
                    </div>
                    <div class="form-group mb-4">
                        <label for="semester">Semester</label><br>
                        <select class="selectpicker form-control" data-live-search="true" id="semester" name="semester">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Edit">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection

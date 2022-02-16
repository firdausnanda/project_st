@extends('layouts.app')

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

                {{-- Tampil Error Validasi --}}
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

                {{-- button print --}}
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#PrintDetail">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                Print
                </button>

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
                        
                        {{-- TAB PENGAJARAN DAN JABATAN --}}
                        <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Data Pengajaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-contact" aria-selected="false">Data Jabatan</a>
                            </li>
                        </ul>

                        {{-- ISI TAB PENGAJARAN DAN JABATAN --}}
                        <div class="tab-content" id="pills-tabContent">
                            {{-- pengajaran --}}
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="zero-config" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Kode Matkul</th>
                                                <th>Matakuliah</th>
                                                <th>Prodi</th>
                                                <th>Semester</th>
                                                <th>Jumlah Kelas</th>
                                                <th>SKS</th>
                                                <th>Total</th>
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
                                                <td>{{ round($m->total) }} ({{ $m->tsks }}T, {{ $m->psks }}P, {{ $m->ksks }}K)
                                                </td>
                                                <td>{{ round($m->grandtotal) }}</td>
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
                                                <th>Jumlah Kelas</th>
                                                <th>SKS</th>
                                                <th>Total</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            {{-- jabatan --}}
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                {{-- Tabel jabatan --}}
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="zero-jabatan" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                {{-- <th>Kode Jabatan</th> --}}
                                                <th>Nama Jabatan</th>
                                                <th>SKS</th>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            @foreach ($jabatan as $j)
                                            <?php $no++ ;?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                {{-- <td>{{ $j->id_jabatan }}</td> --}}
                                                <td>{{ $j->nama_jabatan }}</td>
                                                <td>{{ $j->sks }}</td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NO</th>
                                                {{-- <th>Kode Jabatan</th> --}}
                                                <th>Nama Jabatan</th>
                                                <th>SKS</th>
                                                <th class="no-content"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Data Pembimbingan --}}
                    <div class="tab-pane fade" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">
                        {{-- Tabel Pembimbingan --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-pembimbingan" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Data Penunjang --}}
                    <div class="tab-pane fade" id="border-top-contact" role="tabpanel" aria-labelledby="border-top-contact-tab">
                        {{-- Tabel Penunjang --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-penunjang" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Data Penelitian --}}
                    <div class="tab-pane fade" id="border-top-penelitian" role="tabpanel" aria-labelledby="border-top-penelitian-tab">
                        {{-- Tabel Penelitian --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-penelitian" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Penelitian</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($penelitian as $pen)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pen->jenis_penelitian }}</td>
                                        <td>{{ $pen->sks }}</td>
                                        <td>{{ $pen->masa_penugasan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Penelitian</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    {{-- Data Pengabdian --}}
                    <div class="tab-pane fade" id="border-top-pengabdian" role="tabpanel" aria-labelledby="border-top-pengabdian-tab">
                        {{-- Tabel Pengabdian --}}
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-pengabdian" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Pengabdian</th>
                                        <th>SKS</th>
                                        <th align="center">Masa Penugasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach ($pengabdian as $pen)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $pen->jenis_pengabdian }}</td>
                                        <td>{{ $pen->sks }}</td>
                                        <td>{{ $pen->masa_penugasan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Jenis Pengabdian</th>
                                        <th>SKS</th>
                                        <th>Masa Penugasan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </div>
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
            <a href="{{ route('invoiceuser', $i->id_sgas) }}" target="_blank"><button class="btn btn-success mb-2"
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
            <a href="{{ route('invoiceuser2', $i->id_sgas) }}" target="_blank"><button class="btn btn-success mb-2"
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
@endsection

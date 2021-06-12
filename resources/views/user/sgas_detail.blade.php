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

                {{-- Tombol Print --}}
                <div style="margin-top: 10px; margin-bottom: -10px; margin-left: 10px;">
                    @foreach ($print as $i)
                    <a href="{{ route('invoiceUser', $i->id_sgas) }}" target="_blank"><button class="btn btn-success mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                    Print
                    </button></a>
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
                </ul>

                <div class="tab-content" id="borderTopContent">
                    {{-- Data Pengajaran --}}
                    <div class="tab-pane fade show active" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
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
            </div>
        </div>

    </div>

</div>
@endsection

@extends('layouts.app')

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
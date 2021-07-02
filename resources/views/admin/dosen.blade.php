@extends('layouts.app')

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
                    <select class="selectpicker form-control" data-live-search="true" id="jabatan" name="jabatan">
                        <option value="-" selected>-</option>
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
                        <option value="-">-</option>
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

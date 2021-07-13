@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Data Tahun Akademik</h4>
                </div>

                <div style="margin-top: 20px; margin-bottom: -25px;">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataTa"><i class="far fa-edit"></i>Add Data</button>
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
                                <th>NO</th>
                                <th>Tahun Akademik</th>
                                <th style="font-size:11px;">Tanggal Pengesahan smt Ganjil</th>
                                <th style="font-size:11px;">Tanggal Pengesahan smt Genap</th>
                                <th style="font-size:12px;">Plot No Surat (min - max)</th>
                                <th class="no-content" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($ta as $m)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $m->ta }}</td>
                                <td align="center">{{ $m->tglgjl }}</td>
                                <td align="center">{{ $m->tglgnp }}</td>
                                <td align="center">({{ $m->min }},{{ $m->max }})</td>
                                <td class="row">
                                    <button class="edit-button btn btn-primary mb-2 modal-show"  
                                    data-toggle="modal" data-target="#EditDataTa" 
                                    data-ta="{{ $m->ta }}" data-id="{{ $m->id_ta }}" data-tglgjl="{{ $m->tglgjl }}" data-tglgnp="{{ $m->tglgnp }}"
                                    data-min="{{ $m->min }}" data-max="{{ $m->max }}"><i class="far fa-edit"></i></button>
                                    
                                    <form action="{{url('ta/hapus/'.$m->id_ta)}}" method="GET">
                                        <div class="right gap-items-2">
                                            <button class="btn btn-xs btn-danger submitForm" name="archive" type="submit" id="submitForm" ><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr align="center">
                                <th>NO</th>
                                <th>Tahun Akademik</th>
                                <th>Tanggal Pengesahan smt Genap</th>
                                <th>Tanggal Pengesahan smt Ganjil</th>
                                <th>Plot No Surat (min - max)</th>
                                <th class="no-content"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- Modal Tambah Data --}}
<div class="modal fade fadeinUp" id="TambahDataTa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/ta/store" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="ta">Tahun Akademik</label>
                    <input type="text" class="form-control" id="ta" name="ta" required>
                </div>
                <div class="form-group mb-4">
                    <label for="tglgjl">Tanggal Penetapan Semester Ganjil</label>
                    <input type="text" id="tglgjl" name="tglgjl" class="form-control flatpickr flatpickr-input active">
                </div>
                <div class="form-group mb-4">
                    <label for="tglgnp">Tanggal Penetapan Semester Genap</label>
                    <input type="text" id="tglgnp" name="tglgnp" class="form-control flatpickr flatpickr-input active">
                </div>
                <label for="plotno">Plotting Nomoran Surat</label>
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <label>Min</label>
                        <input type="number" class="form-control" id="min" name="min">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Max</label>
                        <input type="number" class="form-control" id="max" name="max">
                    </div>
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
<div class="modal fade fadeinUp" id="EditDataTa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/ta/update" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" readonly>
                </div>
                <div class="form-group mb-4">
                    <label for="ta">Tahun Akademik</label>
                    <input type="text" class="form-control" id="ta" name="ta" required>
                </div>
                <div class="form-group mb-4">
                    <label for="tglgjl">Tanggal Penetapan Semester Ganjil</label>
                    <input type="text" id="tglgjl2" name="tglgjl" class="form-control flatpickr flatpickr-input active" required>
                </div>
                <div class="form-group mb-4">
                    <label for="tglgnp">Tanggal Penetapan Semester Genap</label>
                    <input type="text" id="tglgnp2" name="tglgnp" class="form-control flatpickr flatpickr-input active" required>
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

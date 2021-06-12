@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Cetak Data</h4>
                </div>

                <div style="margin-top: 30px; margin-bottom: -25px;">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="ta">Tahun Akademik</label>
                            <select class="form-control custom-select selecta" id="taa" name="taa">
                                <option value="" selected>-</option>
                                @foreach($items as $item)
                                <option value="{{ $item->ta }}">{{ $item->ta }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="smt">Semester</label>
                            <select class="form-control custom-select" id="semesterr" name="semesterr">
                                <option value="" selected>-</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button style="margin-top: 32px;" class="btn btn-primary" id="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-filter">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg>
                                Filter
                            </button>
                        </div>
                    </div>
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
                                <th>NIDN/NIDK</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>TA</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($sgas as $m)
                            <?php 
                                $no++ ;
                            ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $m->nidn }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->jabatan }}</td>
                                <td>{{ $m->ta }}</td>
                                <td>{{ ucfirst($m->semester) }}</td>
                                @if($m->validasi == "1")
                                <td style='font-size:15px;'><span class="badge badge-success">Approved</span></td>
                                @elseif($m->validasi == "0")
                                <td style='font-size:15px;'><span class="badge badge-danger">Pending</span></td>
                                @endif
                                <td class="row">
                                    <a href="/cetak/detail/{{ $m->id_sgas }}"><button class="btn btn-xs btn-primary">Details</button></a>
                                    {{-- <button class="edit-button btn btn-primary mb-2 modal-show"  
                                    data-toggle="modal" data-target="#EditDataSgas" 
                                    data-nidnn="{{ $m->nidn }}" 
                                    data-namaa="{{ $m->nama }}" data-jabatann="{{ $m->jabatan }}" 
                                    data-ta="{{ $m->ta }}" data-semester="{{ $m->semester }}"><i class="far fa-edit"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>NIDN/NIDK</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>TA</th>
                                <th>Semester</th>
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
@endsection

@extends('layouts.app')

@section('sidebar')
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/prodi" aria-expanded="false"
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
                <a href="/inputdata" data-active="true" aria-expanded="true" class="dropdown-toggle" style="text-decoration: none;">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                        class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                        <rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line>
                        <line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line>
                        <line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line>
                        <line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line>
                        <line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Input Data</span>
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
                    <h4 style="font-weight: bold;">Data Detail</h4>
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
                    @foreach ($ngecek as $n)  
                    @if ($n->validasi == '0')
                    {{-- button tambah --}}
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataDetail"><i class="far fa-edit"></i>Add Data</button>
                    @endif
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
                                    @if ($m->validasi == '0')
                                    <form action="{{url('inputdata/detail/hapus/'.$m->id_detailsgas)}}" method="GET">
                                        <div class="right gap-items-2">
                                            <button class="btn btn-xs btn-danger submitForm" name="archive" type="submit" id="submitForm" ><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </form>
                                    @endif
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
            <form action="/inputdata/detail/store" method="POST" name="tambah">
            {{ csrf_field() }}
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
                <input type="hidden" value="{{ Auth::user()->prodi }}" id="prodi" name="prodi" required>
                {{-- <div class="form-group mb-4">
                    <label for="prodi">Prodi</label>
                    <select class="selectpicker form-control" data-live-search="true" id="prodi" name="prodi" required>
                        <option value="0" selected>-</option>
                        @foreach($prodi as $p)
                        <option value="{{ $p->nama_prodi }}">{{ $p->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group mb-4">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="teori">Teori <div style="font-size:12px;"><i>SKS</i></div></label>
                    <input type="number" name="teori" id="teori" class="form-control" onkeyup="sum();" onclick="sum();" required>
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
                    <label for="teori">Praktek <div style="font-size:12px;"><i>SKS</i></div></label>
                    <input type="number" name="praktek" id="praktek" class="form-control" onkeyup="sum();" onclick="sum();" required>
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
                    <label for="teori">Klinik <div style="font-size:12px;"><i>SKS</i></div></label>
                    <input type="number" name="klinik" id="klinik" class="form-control" onkeyup="sum();" onclick="sum();" required>
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
                    <input type="number" name="total" id="total" class="form-control" value="0" readonly>
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

{{-- Modal Edit Data --}}
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

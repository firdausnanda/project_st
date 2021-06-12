@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Data Mata Kuliah</h4>
                </div>

                <div style="margin-top: 20px; margin-bottom: -25px;">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#TambahDataMatkul"><i class="far fa-edit"></i>Add Data</button>
                    <div class="card component-card_1" style="width:50%;">
                        <div class="card-body">
                            <div class="card-title"><span style="color: red;">*</span> <b>Catatan</b></div>
                            <table>
                                <tr>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        Awalan Kode Matkul :
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        191 Prodi DIII Keperawatan
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        197 Prodi Profesi Bidan
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        192 Prodi DIII Kebidanan
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        195 Prodi DIII Rekam Medis
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        193 Prodi DIII Akupunktur
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        209 Prodi S1 Farmasi
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        194 Prodi DIII Farmasi
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        2010 Prodi S1 Informatika
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        196 Prodi DIV Kebidanan
                                        </p>
                                    </td>
                                    <td>
                                        <p class="card-text" style="font-size: 12px;">
                                        208 Prodi S1 Fisioterapi
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
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

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matkul</th>
                                <th style="width: 35%;">Mata Kuliah</th>
                                <th>SKS</th>
                                <th>T</th>
                                <th>P</th>
                                <th>K</th>
                                <th>Kurikulum</th>
                                <th>PJMK</th>
                                <th class="no-content" style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($matkul as $m)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td style="font-size: 11px;">{{ $m->kode_matkul }}</td>
                                <td style="font-size: 12px;">{{ $m->nama_matkul }}</td>
                                <td>{{ $m->sks }}</td>
                                <td>{{ $m->t }}</td>
                                <td>{{ $m->p }}</td>
                                <td>{{ $m->k }}</td>
                                <td>{{ $m->kurikulum }}</td>
                                @if ($m->nama_dosen == "")
                                <td>-</td>                                   
                                @else
                                <td>{{ $m->nama_dosen }}</td>                                    
                                @endif
                                <td class="row">
                                    <button class="edit-button btn btn-primary mb-2 modal-show"  
                                    data-toggle="modal" data-target="#EditDataMatkul" 
                                    data-kode_matkul="{{ $m->kode_matkul }}" 
                                    data-nama_matkul="{{ $m->nama_matkul }}" 
                                    data-sks="{{ $m->sks }}"
                                    data-tsks="{{ $m->t }}"
                                    data-psks="{{ $m->p }}"
                                    data-ksks="{{ $m->k }}"
                                    data-kurikulum="{{ $m->kurikulum }}"
                                    data-pjmk="{{ $m->nama_dosen }}"
                                    data-prodi="{{ $m->prodii }}"><i class="far fa-edit"></i></button>
                                    
                                    <form action="{{url('matkul/hapus/'.$m->id_matkul)}}" method="GET">
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
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>T</th>
                                <th>P</th>
                                <th>K</th>
                                <th>Kurikulum</th>
                                <th>PJMK</th>
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
<div class="modal fade fadeinUp" id="TambahDataMatkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Tambah Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/matkul/store" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="nidn">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
                </div>
                <div class="form-group mb-4">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <textarea name="nama_matkul" id="nama-matkul" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">SKS</label>
                    <input type="text" name="sks" id="sks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Teori (T)</label>
                    <input type="text" name="tsks" id="tsks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Praktek (P)</label>
                    <input type="text" name="psks" id="psks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Klinis (K)</label>
                    <input type="text" name="ksks" id="ksks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="kurikulum">Kurikulum</label>
                    <input type="text" name="kurikulum" id="kurikulum" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="pjmk">PJMK</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="pjmk" name="pjmk"> 
                        <option value="-">-</option>
                        @foreach($dosen as $mat)
                        <option value="{{ $mat->nama }}">{{ $mat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="prodi">Prodi</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="prodi" name="prodi" required> 
                        <option value="-">-</option>
                        @foreach($prodi as $prod)
                        <option value="{{ $prod->nama_prodi }}">{{ $prod->nama_prodi }}</option>
                        @endforeach
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
<div class="modal fade fadeinUp" id="EditDataMatkul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Edit Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form action="/matkul/update" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" readonly>
                </div>
                <div class="form-group mb-4">
                    <label for="nama_matkul">Nama Mata Kuliah</label>
                    <textarea name="nama_matkul" id="nama_matkul" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">SKS</label>
                    <input type="text" name="sks" id="sks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Teori (T)</label>
                    <input type="text" name="tsks" id="tsks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Praktek (P)</label>
                    <input type="text" name="psks" id="psks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="sks">Klinis (K)</label>
                    <input type="text" name="ksks" id="ksks" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="kurikulum">Kurikulum</label>
                    <input type="text" name="kurikulum" id="kurikulum" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="pjmk">PJMK</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="pjmk" name="pjmk"> 
                        <option value="-">-</option>
                        @foreach($dosen as $mat)
                        <option value="{{ $mat->nama }}">{{ $mat->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="prodi">Prodi</label><br>
                    <select class="selectpicker form-control" data-live-search="true" id="prodi" name="prodi"> 
                        <option value="-">-</option>
                        @foreach($prodi as $prod)
                        <option value="{{ $prod->nama_prodi }}">{{ $prod->nama_prodi }}</option>
                        @endforeach
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

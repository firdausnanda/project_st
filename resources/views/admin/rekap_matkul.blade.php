@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                
                <div class="">
                    <h4 style="font-weight: bold;">Data Rekap Mata Kuliah</h4>
                </div>

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>T</th>
                                <th>P</th>
                                <th>K</th>
                                <th>Team Teaching</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($rekapmatkul as $m)
                            <?php 
                                $no++ ;
                            ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $m->kode_matkul }}</td>
                                <td>{{ $m->nama_matkul }}</td>
                                <td>{{ $m->sks }}</td>
                                <td>{{ $m->t }}</td>
                                <td>{{ $m->p }}</td>
                                <td>{{ $m->k }}</td>
                                <td>
                                @php
                                    $data = explode("@" , $m->nama);
                                    foreach ($data as $key => $dataa) {
                                    echo "<li>".$dataa."</li>";
                                    }
                                    echo "<br>";
                                @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>T</th>
                                <th>P</th>
                                <th>K</th>
                                <th>Team Teaching</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
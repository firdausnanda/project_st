@extends('layouts.app')

@section('konten')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">

                <div class="">
                    <h4 style="font-weight: bold;">Data Rekap Dosen Total</h4>
                </div>

                @if(Auth::user()->role == 'superadmin')
                    @php
                        $data = route('printdosentotal');
                    @endphp
                @elseif(Auth::user()->role == 'admin')
                    @php
                        $data = route('printdosentotaladmin');
                    @endphp
                @endif

                <form action="{{ $data }}" target="_blank">
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
                                <label for="statuss">Status</label>
                                <select class="form-control custom-select" id="statuss" name="statuss">
                                    <option value="" selected>-</option>
                                    <option value="Tetap">Tetap</option>
                                    <option value="Tidak Tetap">Tidak Tetap</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <div style="margin-top: 32px;" class="btn btn-primary" id="filter3" name="filter3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                    Filter
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- button print --}}
                    <div style="margin-top: 20px; margin-bottom: -20px;">
                        {{-- <a href="{{ route('printdosentotal') }}" target="_blank">
                        <button class="btn btn-success mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-printer">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                </path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Print
                        </button>
                        </a> --}}
                        <button type="submit" class="btn btn-success mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-printer">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                </path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Print
                        </button>
                    </div>
                </form>

                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NRP/NIP/NIK NIDN/NIDK</th>
                                <th>Nama Dosen</th>
                                <th>Status</th>
                                <th style="text-align: center;">TA</th>
                                <th>SMT</th>
                                <th>Matakuliah</th>
                                <th>SKS</th>
                                <th>Kelas</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($rekapdosen as $m)
                            <?php 
                                $no++ ;
                                $rowspan = count(explode("@", $m->nama_matkul)) + 1;
                            ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $m->nidn }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->status }}</td>
                                <td>{{ $m->ta }}</td>
                                <td style="text-align: center;">{{ ucfirst($m->semester) }}</td>
                                <td style="font-size: 12px;">
                                    @php
                                    $data = explode("@" , $m->nama_matkul);
                                    foreach ($data as $key => $dataa) {
                                    echo "<li style='margin: 5px;'>".$dataa."</li>";
                                    }
                                    echo "<br>";
                                    @endphp
                                </td>
                                <td style="font-size: 12px;">
                                    @php
                                    $data = explode("@" , $m->sks);
                                    foreach ($data as $key => $dataa) {
                                    echo "<li style='margin: 5px;'>".$dataa."</li>";
                                    }
                                    echo "<br>";
                                    @endphp
                                </td>
                                <td style="font-size: 12px;">
                                    @php
                                    $data = explode("@" , $m->kelas);
                                    foreach ($data as $key => $dataa) {
                                    echo "<li style='margin: 5px;'>".$dataa."</li>";
                                    }
                                    echo "<br>";
                                    @endphp
                                </td>
                                <td style="font-size: 12px;">
                                    @php
                                    $data = explode("@" , $m->total);
                                    foreach ($data as $key => $dataa) {
                                    echo "<li style='margin: 5px;'>".$dataa."</li>";
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
                                <th>NRP/NIP/NIK NIDN/NIDK</th>
                                <th>Nama Dosen</th>
                                <th>Status</th>
                                <th>TA</th>
                                <th>SMT</th>
                                <th>Matakuliah</th>
                                <th>SKS</th>
                                <th>Kelas</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

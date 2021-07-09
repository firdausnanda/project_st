<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo 90x90.png') }}" />
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        hr {
            width: 63%;
        }

        #judul {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
        }

        #kop {
            text-align: left;
            padding: 0px;
            font-family: Arial, sans-serif;
            font-weight: normal;
            font-size: 14px;
        }

        /* #halaman {
            margin-top: 1%;
            margin-left: 2%;
            display: inline-block;
            width: auto;
            height: auto;
            position: absolute; 
            border: 1px solid; 
            padding-top: 10px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
            font-size: 14px;
        } */

        table {
            font-family: arial, sans-serif;
            width: 100%;
            font-size: 14px;
            border-collapse: collapse;
        }

        td,
        th {
            border-bottom: 1px solid #ddd;
            border-top: 1px solid #dddddd;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            /*padding: 20mm;*/
            padding-top: 10px;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 80px;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
        size: A4;
        margin: 0; /* this affects the margin in the printer settings */
        }

        @media print {
            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

    <div class="book">
        <div class="page">
            {{-- <div class="subpage"> --}}
                    <div id="subpage">
                        <h5 id="kop">YAYASAN WAHANA BHAKTI KARYA HUSADA <br>
                            INSTITUT TEKNOLOGI SAINS dan KESEHATAN RS DR. SOEPRAOEN
                            <hr align="left">
                        </h5>

                        <h5 style="font-weight: normal; font-size: 14px; text-align: center;">SURAT TUGAS</h5>
                        <h5 style="margin-top: -20px; font-weight: normal; font-size: 14px; text-align: center;">Nomor :
                            @foreach ($tampil as $item)
                            Sgas/ {{ $item->no_plot }} /
                            @if(ucfirst($item->semester) == 'Ganjil')
                            @php
                                $data = explode("-" , $item->tglgjl);
                                $romawi = getRomawi($data[1]);
                                echo $romawi;
                            @endphp
                            @elseif(ucfirst($item->semester) == 'Genap')
                            @php
                                $data = explode("-" , $item->tglgnp);
                                $romawi = getRomawi($data[1]);
                                echo $romawi;
                            @endphp
                            @endif
                            /{{ substr($item->ta,0,4) }}
                            @endforeach
                        </h5>

                        <table style="margin-top: 50px; height: 35px;">
                            @foreach ($tampil as $item)
                            <tr>
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;">Pertimbangan</td>
                                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                                    &ensp;&ensp;&ensp;&ensp;Bahwa untuk menjadi Dosen Pengajar Semester
                                    {{ ucfirst($item->semester) }} TA. {{ $item->ta }}
                                    Program Studi {{ $item->prodi }} ITSK RS DR. Soepraoen Kesdam V/Brw Malang, maka perlu dikeluarkan surat
                                    tugas
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;">Dasar</td>
                                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                                    &ensp;&ensp;&ensp;&ensp;Rencana Operasional Pengajaran Semester
                                    {{ucfirst($item->semester) }}
                                    TA. {{ $item->ta }} Program Studi {{ $item->prodi }} ITSK RS DR. Soepraoen Kesdam V/Brw Malang
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;">Kepada</td>
                                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                                    Nama, NIDN, Pengampu Mata Kuliah, seperti tersebut pada lampiran
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;">Untuk</td>
                                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                                    1.&ensp;&ensp;&ensp;Seterimanya surat perintah ini ditugaskan sebagai Dosen Pengajar
                                    Semester {{ ucfirst($item->semester) }}
                                    Program Studi {{ $item->prodi }} TA. {{ $item->ta }}
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;"></td>
                                <td style="width: 5%; border: none; vertical-align: top;"></td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                                    2.&ensp;&ensp;&ensp;Lapor kepada Rektor ITSK RS DR. Soepraoen atas pelaksanaan surat
                                    perintah ini.
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;"></td>
                                <td style="width: 5%; border: none; vertical-align: top;"></td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                                    3.&ensp;&ensp;&ensp;Melaksanakan perintah ini dengan seksama dan penuh rasa tanggung
                                    jawab.
                                </td>
                            </tr>
                            <tr style="height:10px;">
                                <td style="border: none;"></td>
                            </tr>
                            <tr style="height:50px;">
                                <td style="width: 35%; border: none; vertical-align: top;">Selesai.</td>
                                <td style="width: 5%; border: none; vertical-align: top;"></td>
                                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;"></td>
                            </tr>
                            @endforeach
                        </table>

                        <table style="width: 60%; text-align: left; float: right; margin-top: 25px;">
                            <tr>
                                <td style="width: 40%; border: none;" align="right">Ditetapkan di</td>
                                <td style="border: none;">:</td>
                                <td style="border: none;">Malang</td>
                            </tr>
                            <tr>
                                <td style="width: 40%; border: none;" align="right">Pada tanggal</td>
                                <td style="border: none;">:</td>
                                <td style="border: none;">
                                    @foreach ($tampil as $item)
                                    @if(ucfirst($item->semester) == 'Ganjil')
                                    {{ $item->tglgjl }}
                                    @elseif(ucfirst($item->semester) == 'Genap')
                                    {{ $item->tglgnp }}
                                    @endif
                                    @endforeach
                                
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none;" colspan="3">
                                    <hr style="width: 50%;">
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none;" align="center" valign="bottom" colspan="3"></td>
                            </tr>

                            <tr height="80px">
                                <td style="border: none;" align="center" valign="bottom" colspan="3">
                                    <img src="{{ asset('assets/img/ttd.png')}}" alt="ttd"><br>
                                    {{-- Arief Efendi, SMPh., SH(adv)., S.Kep., Ners., MM., M.Kes --}}
                                    </td>
                            </tr>
                            <tr>
                                {{-- <td style="border: none;" align="center" valign="bottom" colspan="3">NIDK. 8807901019
                                </td> --}}
                            </tr>
                        </table>

                        <table style="border: none;">
                            <tr style="border: none;">
                                <td style="border: none;">Salinan surat ini disampaikan kepada :</td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;">1. Yang bersangkutan</td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;">2. Arsip</td>
                            </tr>
                        </table>
                    </div>
            {{-- </div> --}}
        </div>

        <div class="page">
            {{-- <div class="subpage">Page 2/2 --}}
                <div id="subpage">
                    <h5 id="kop">YAYASAN WAHANA BHAKTI KARYA HUSADA <br>
                        INSTITUT TEKNOLOGI SAINS dan KESEHATAN RS DR. SOEPRAOEN
                        <hr align="left">
                    </h5>

                    {{-- <h5 style="margin-top: -10px; font-weight: normal; font-size: 14px;">Lampiran Nomor :
                        Sgas/&ensp;&ensp;&ensp;&ensp;/&ensp;&ensp;&ensp;&ensp;/</h5> --}}
                    
                    <h5 style="margin-top: -10px; font-weight: normal; font-size: 14px;">Lampiran Nomor :
                            @foreach ($tampil as $item)
                            Sgas/ {{ $item->no_plot }} /
                            @if(ucfirst($item->semester) == 'Ganjil')
                            @php
                                $data = explode("-" , $item->tglgjl);
                                $romawi = getRomawi($data[1]);
                                echo $romawi;
                            @endphp
                            @elseif(ucfirst($item->semester) == 'Genap')
                            @php
                                $data = explode("-" , $item->tglgnp);
                                $romawi = getRomawi($data[1]);
                                echo $romawi;
                            @endphp
                            @endif
                            /{{ substr($item->ta,0,4) }}
                            @endforeach
                    </h5>


                    <h3 id="judul">SURAT TUGAS</h3>

                    <table style="margin-top: 35px; border: none;">
                        @foreach ($tampil as $inv)
                        <tr style="height: 35px;">
                            <td style="width: 2%; border: none;">1.</td>
                            <td style="width: 35%; border: none;">Pejabat yang memberi tugas</td>
                            <td style="width: 5%; border: none;">:</td>
                            <td style="width: 58%; border: none;">Rektor ITSK RS DR.Soepraoen</td>
                        </tr>
                        <tr style="height: 35px;">
                            <td style="width: 2%; border: none;">2.</td>
                            <td style="width: 35%; border: none;">Nama yang diberi tugas</td>
                            <td style="width: 5%; border: none;">:</td>
                            <td style="width: 58%; border: none;">{{ $inv->nama }}</td>
                        </tr>
                        <tr style="height: 35px;">
                            <td style="width: 2%; border: none;">3.</td>
                            <td style="width: 35%; border: none;">Jabatan</td>
                            <td style="width: 5%; border: none;">:</td>
                            <td style="width: 58%; border: none;">{{ $inv->jabatan }}</td>
                        </tr>
                        <tr style="height: 35px;">
                            <td style="width: 2%; border: none;">4.</td>
                            <td style="width: 35%; border: none;">Jabatan Fungsional</td>
                            <td style="width: 5%; border: none;">:</td>
                            <td style="width: 58%; border: none;">{{ $inv->jabatan_fungsional }}</td>
                        </tr>
                        <tr style="height: 35px;">
                            <td style="width: 2%; border: none;">5.</td>
                            <td style="width: 35%; border: none;">NRP / NIP / NIK / NIDN / NIDK</td>
                            <td style="width: 5%; border: none;">:</td>
                            <td style="width: 58%; border: none;">{{ $inv->nidn }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div style="margin-top: 15px;"></div>
                    <h4>I. Pengajaran</h4>
                    <table>
                        <thead>
                            <tr style="height: 25px;">
                                <th>No</th>
                                <th>Kode Matkul</th>
                                <th>Matakuliah</th>
                                <th>Prodi</th>
                                <th>Semester</th>
                                <th>Kelas</th>
                                <th>SKS</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($invoice as $m)
                            <?php $no++ ;?>
                            <tr style="height: 25px;">
                                <td align="center">{{ $no }}</td>
                                <td align="center">{{ $m->kode_matkul }}</td>
                                <td style="font-size:12px;">{{ $m->nama_matkul }}</td>
                                <td style="font-size:12px;">{{ $m->prodi }}</td>
                                <td align="center">{{ $m->semesterd }}</td>
                                <td align="center">{{ $m->kelas }}</td>
                                <td align="center">{{ $m->total }} ({{ $m->tsks }}T, {{ $m->psks }}P,
                                    {{ $m->ksks }}K)</td>
                                <td align="center">{{ $m->grandtotal }}</td>
                            </tr>
                            @endforeach
                            <tr style="height: 25px;">
                                <td></td>
                                <td colspan="6" style="font-weight: bold;">Total</td>
                                <td align="center">{{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>II. Pembimbingan</h4>
                    <table>
                        <thead>
                            <tr style="height: 25px;">
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Masa Pelaksanaan Tugas</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($pembimbing as $pem)
                            <?php $no++ ;?>
                            <tr style="height: 25px;">
                                <td align="center">{{ $no }}</td>
                                <td>{{ $pem->jenis_kegiatan }}</td>
                                <td align="center">{{ $pem->masa_penugasan }}</td>
                                <td align="center">{{ $pem->sks }}</td>
                            </tr>
                            @endforeach
                            <tr style="height: 25px;">
                                <td></td>
                                <td colspan="2" style="font-weight: bold;">Total</td>
                                <td align="center">{{ $totalpembimbing }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @if($counttotal <= 7)
                    <h4>III. Penunjang</h4>
                    <table>
                        <thead>
                            <tr style="height: 25px;">
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Masa Pelaksanaan Tugas</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($penunjang as $pen)
                            <?php $no++ ;?>
                            <tr style="height: 25px;">
                                <td align="center">{{ $no }}</td>
                                <td>{{ $pen->jenis_kegiatan }}</td>
                                <td align="center">{{ $pen->masa_penugasan }}</td>
                                <td align="center">{{ $pen->sks }}</td>
                            </tr>
                            @endforeach
                            <tr style="height: 25px;">
                                <td></td>
                                <td colspan="2" style="font-weight: bold;">Total</td>
                                <td align="center">{{ $totalpenunjang }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table style="width: 60%; text-align: left; float: right; margin-top: 25px;">
                        <tr>
                            <td style="width: 40%; border: none;" align="right">Ditetapkan di</td>
                            <td style="border: none;">:</td>
                            <td style="border: none;">Malang</td>
                        </tr>
                        <tr>
                            <td style="width: 40%; border: none;" align="right">Pada tanggal</td>
                            <td style="border: none;">:</td>
                            <td style="border: none;">
                            @foreach ($tampil as $item)
                            @if(ucfirst($item->semester) == 'Ganjil')
                            {{ $item->tglgjl }}
                            @elseif(ucfirst($item->semester) == 'Genap')
                            {{ $item->tglgnp }}
                            @endif
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;" colspan="3">
                                <hr style="width: 50%;">
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;" align="center" valign="bottom" colspan="3"></td>
                        </tr>

                        <tr height="80px">
                            <td style="border: none;" align="center" valign="bottom" colspan="3">
                                <img src="{{ asset('assets/img/ttd.png')}}" alt="ttd"><br>
                                    {{-- Arief Efendi, SMPh., SH(adv)., S.Kep., Ners., MM., M.Kes --}}
                                    </td>
                        </tr>
                        <tr>
                            {{-- <td style="border: none;" align="center" valign="bottom" colspan="3">NIDK. 8807901019
                            </td> --}}
                        </tr>
                    </table> 
                    @endif
                </div>
            {{-- </div> --}}
        </div>

        <div class="page">
            {{-- <div class="subpage">Page 2/2 --}}
                <div id="subpage">
                    @if($counttotal >= 8)
                    <h4>III. Penunjang</h4>
                    <table>
                        <thead>
                            <tr style="height: 25px;">
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Masa Pelaksanaan Tugas</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($penunjang as $pen)
                            <?php $no++ ;?>
                            <tr style="height: 25px;">
                                <td align="center">{{ $no }}</td>
                                <td>{{ $pen->jenis_kegiatan }}</td>
                                <td align="center">{{ $pen->masa_penugasan }}</td>
                                <td align="center">{{ $pen->sks }}</td>
                            </tr>
                            @endforeach
                            <tr style="height: 25px;">
                                <td></td>
                                <td colspan="2" style="font-weight: bold;">Total</td>
                                <td align="center">{{ $totalpenunjang }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table style="width: 60%; text-align: left; float: right; margin-top: 25px;">
                        <tr>
                            <td style="width: 40%; border: none;" align="right">Ditetapkan di</td>
                            <td style="border: none;">:</td>
                            <td style="border: none;">Malang</td>
                        </tr>
                        <tr>
                            <td style="width: 40%; border: none;" align="right">Pada tanggal</td>
                            <td style="border: none;">:</td>
                            <td style="border: none;">
                            @foreach ($tampil as $item)
                            @if(ucfirst($item->semester) == 'Ganjil')
                            18 Agustus {{ substr($item->ta,0,4) }}
                            @elseif(ucfirst($item->semester) == 'Genap')
                            18 Februari {{ substr($item->ta,0,4) }}
                            @endif
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;" colspan="3">
                                <hr style="width: 50%;">
                            </td>
                        </tr>
                        <tr>
                            <td style="border: none;" align="center" valign="bottom" colspan="3"></td>
                        </tr>

                        <tr height="80px">
                            <td style="border: none;" align="center" valign="bottom" colspan="3">
                                <img src="{{ asset('assets/img/ttd.png')}}" alt="ttd"><br>
                                    {{-- Arief Efendi, SMPh., SH(adv)., S.Kep., Ners., MM., M.Kes --}}
                                    </td>
                        </tr>
                        <tr>
                            {{-- <td style="border: none;" align="center" valign="bottom" colspan="3">NIDK. 8807901019
                            </td> --}}
                        </tr>
                    </table>    
                    @endif
                </div>
            {{-- </div> --}}
        </div>
    </div>
</body>
@php
    function getRomawi($bln){
        switch ($bln){
            case 'Januari':
            return "I";
            break;
        
            case 'Februari':
            return "II";
            break;

            case 'Maret':
            return "III";
            break;

            case 'April':
            return "IV";
            break;

            case 'Mei':
            return "V";
            break;

            case 'Juni':
            return "VI";
            break;

            case 'Juli':
            return "VII";
            break;

            case 'Agustus':
            return "VIII";
            break;

            case 'September':
            return "IX";
            break;

            case 'Oktober':
            return "X";
            break;

            case 'November':
            return "XI";
            break;

            case 'Desember':
            return "XII";
            break;
        }
    }
@endphp
<script>
   window.onload=function(){
        event.preventDefault();
        /* Act on the event */
        window.print();
    }
</script>
</html>
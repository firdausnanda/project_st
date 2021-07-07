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
            font-weight: normal;
            font-size: 15px;
        }

        #kop {
            text-align: center;
            padding: 0px;
            font-family: Arial, sans-serif;
            font-weight: normal;
            font-size: 18px;
        }

        #subkop {
            font-size: 20px;
            text-align: center;
            margin: 0px;
            margin-top: -30px;
        }

        #supkop-min {
            margin-top: 1px;
            text-align: center;
            font-size: 12px;
            font-weight: normal;
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
                -webkit-print-color-adjust: exact;
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
            <div id="subpage">
                <table style="margin-top: 24px;" border="0">
                    <tr>
                        <td style="border: none;" align="center"><img src="{{ asset('assets/img/YWBKH.jpg')}}" style="width: 75px; height: 75px;" alt='ywbkh'></td>
                        <td style="border: none;" align="center"><h5 id="kop">YAYASAN WAHANA BHAKTI KARYA HUSADA </h5>
                            <h4 id="subkop">INSTITUT TEKNOLOGI SAINS DAN KESEHATAN<br>
                            RS dr. SOEPRAOEN KESDAM V/BRW
                            </h4>
                            <h5 id="supkop-min" style="margin-bottom: 5px;">Jalan Soedanco Supriadi nomor 22 Malang 65147 Telp (0341) 351275 Fax. (0341) 351310 <br>
                            Website : www.itsk-soepraoen.ac.id / Email : informasi@itsk-soepraoen.ac.id
                            </h5>
                        </td>
                        <td style="border: none;" align="center"><img src="{{ asset('assets/img/logo 90x90.png')}}" style="width: 75px; height: 75px;" alt='itsk'></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>

                    {{-- <h3 id="judul">Rekap Data Dosen</h3> --}}
                    <h3 id="judul"><b>Rekapitulasi Data Pengajaran Dosen <br>
                                Institut Teknologi Sains dan Kesehatan RS DR Soepraoen Kesdam V/Brw Malang </b><br>
                                @if($prd != null)
                                    Program Studi {{ $prd }} 
                                @endif
                                @if($ta != null)
                                    Tahun Ajaran {{ $ta }} 
                                @endif
                                @if($smt != null)
                                    Semester {{ ucfirst($smt) }}
                                @endif
                    </h3>

                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NRP/NIP/NIK NIDN/NIDK</th>
                                    <th>Nama Dosen</th>
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
                                    <td width="5%" align="center">{{ $no }}</td>
                                    <td width="15%">{{ $m->nidn }}</td>
                                    <td width="30%" style="font-size: 12px;">{{ $m->nama }}</td>
                                    <td width="20%" style="font-size: 12px;">
                                        @php
                                        $data = explode("@" , $m->nama_matkul);
                                        foreach ($data as $key => $dataa) {
                                        echo "<li style='margin: 10px;'>".$dataa."</li>";
                                        }
                                        echo "<br>";
                                        @endphp
                                    </td>
                                    <td width="10%">
                                        @php
                                        $data = explode("@" , $m->sks);
                                        foreach ($data as $key => $dataa) {
                                        echo "<li style='margin: 10px;'>".$dataa."</li>";
                                        }
                                        echo "<br>";
                                        @endphp
                                    </td>
                                    <td width="10%">
                                        @php
                                        $data = explode("@" , $m->kelas);
                                        foreach ($data as $key => $dataa) {
                                        echo "<li style='margin: 10px;'>".$dataa."</li>";
                                        }
                                        echo "<br>";
                                        @endphp
                                    </td>
                                    <td width="10%">
                                        @php
                                        $data = explode("@" , $m->total);
                                        foreach ($data as $key => $dataa) {
                                        echo "<li style='margin: 10px;'>".$dataa."</li>";
                                        }
                                        echo "<br>";
                                        @endphp
                                    </td>
                                </tr>
                                <tr style="background-color: #e1eeff; height: 10px;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold; text-align: center;">Total</td>
                                    @php
                                    $data = explode("@" , $m->total);
                                    echo '<td style="font-weight: bold; text-align: center;">'.array_sum($data).'</td>';
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="font-size: 17px;">
                                    <th colspan="6">Grand Total</th>
                                    <th>{{ $totalsks }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</body>

<script>
   window.onload=function(){
        event.preventDefault();
        /* Act on the event */
        window.print();
    }
</script>
</html>
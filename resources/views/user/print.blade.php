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

        #halaman {
            margin-top: 1%;
            margin-left: 2%;
            display: inline-block;
            width: auto;
            height: auto;
            /* position: absolute; */
            /* border: 1px solid; */
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
            font-size: 14px;
        }

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

        @page {
        size: auto;
        margin: 0mm; /* this affects the margin in the printer settings */
        }
    </style>
</head>

<body>
    <div id="halaman">
        <h5 id="kop">YAYASAN WAHANA BHAKTI KARYA HUSADA <br>
            INSTITUT TEKNOLOGI SAINS dan KESEHATAN RS dr. SOEPRAOEN
            <hr align="left">
        </h5>

        <h5 style="margin-top: -10px; font-weight: normal; font-size: 14px;">Lampiran Nomor :
            Sgas/&ensp;&ensp;&ensp;&ensp;/&ensp;&ensp;&ensp;&ensp;/</h5>


        <h3 id="judul">SURAT TUGAS</h3>

        <table style="margin-top: 50px; border: none;">
            @foreach ($tampil as $inv)
            <tr style="height: 35px;">
                <td style="width: 2%; border: none;">1.</td>
                <td style="width: 35%; border: none;">Pejabat yang memberi tugas</td>
                <td style="width: 5%; border: none;">:</td>
                <td style="width: 58%; border: none;">Rektor ITSK RS dr.Soepraoen</td>
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
        <div style="margin-top: 25p }}</td>                
                </tr>
                @endforeach
                <tr style="height: 25px;">
                    <td></td>
                    <td colspan="5" style="font-weight: bold;">Total</td>
                    <td align="center">{{ $total }}</td>
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
                <td style="border: none;"></td>
            </tr>
            <tr>
                <td style="border: none;" colspan="3">
                    <hr style="width: 50%;">
                </td>
            </tr>
            <tr>
                <td style="border: none;" align="center" valign="bottom" colspan="3">Rektor</td>
            </tr>
            
            <tr height="80px">
                <td style="border: none;" align="center" valign="bottom" colspan="3">
                    <img src="{{ asset('assets/img/ttd.png')}}" alt="ttd"><br>
                    Arief Efendi, S.Kep., Ns., MM., M.Kes</td>
            </tr>
            <tr>
                <td style="border: none;" align="center" valign="bottom" colspan="3">NIDK. 8807901019</td>
            </tr>
        </table>
    </div>
    <div id="halaman">
        <h5 id="kop">YAYASAN WAHANA BHAKTI KARYA HUSADA <br>
            INSTITUT TEKNOLOGI SAINS dan KESEHATAN RS dr. SOEPRAOEN
            <hr align="left">
        </h5>

        <h5 style="font-weight: normal; font-size: 14px; text-align: center;">SURAT TUGAS</h5>
        <h5 style="margin-top: -20px; font-weight: normal; font-size: 14px; text-align: center;">Nomor :
            Sgas/&ensp;&ensp;&ensp;&ensp;/&ensp;&ensp;&ensp;&ensp;/</h5>

        <table style="margin-top: 50px; height: 35px;">
            @foreach ($tampil as $item)
            <tr><td style="border: none;"></td></tr>
            <tr style="height:50px;">
                <td style="width: 35%; border: none; vertical-align: top;">Pertimbangan</td>
                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                    &ensp;&ensp;&ensp;&ensp;Bahwa untuk menjadi Dosen Pengajar Semester {{ ucfirst($item->semester) }} TA. {{ $item->ta }}
                    Program Studi {{ $item->prodi }} ITSK RS dr Soepraoen, maka perlu dikeluarkan surat tugas
                </td>
            </tr>
            <tr style="height:10px;"><td style="border: none;"></td></tr>
            <tr style="height:50px;">
                <td style="width: 35%; border: none; vertical-align: top;">Dasar</td>
                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                    &ensp;&ensp;&ensp;&ensp;Permohonan penerbitan Surat Tugas Pengajar Semester {{ ucfirst($item->semester) }}
                    TA. {{ $item->ta }} Program Studi {{ $item->prodi }} ITSK RS dr Soepraoen
                </td>
            </tr>
            <tr style="height:10px;"><td style="border: none;"></td></tr>
            <tr style="height:50px;">
                <td style="width: 35%; border: none; vertical-align: top;">Kepada</td>
                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                    Nama, NIDN, Pengampu Mata Kuliah, seperti tersebut pada lampiran
                </td>
            </tr>
            <tr style="height:10px;"><td style="border: none;"></td></tr>
            <tr style="height:50px;">
                <td style="width: 35%; border: none; vertical-align: top;">Untuk</td>
                <td style="width: 5%; border: none; vertical-align: top;">:</td>
                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                    1.&ensp;&ensp;&ensp;Seterimanya surat perintah ini ditugaskan sebagai Dosen Pengajar Semester {{ ucfirst($item->semester) }}
                    Program Studi {{ $item->prodi }} TA. {{ $item->ta }}
                </td>
            </tr>
            <tr style="height:10px;"><td style="border: none;"></td></tr>
            <tr style="height:50px;">
                <td style="width: 35%; border: none; vertical-align: top;"></td>
                <td style="width: 5%; border: none; vertical-align: top;"></td>
                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                    2.&ensp;&ensp;&ensp;Lapor kepada Rektor ITSK RS dr. Soepraoen atas pelaksanaan surat perintah ini.
                </td>
            </tr>
            <tr style="height:10px;"><td style="border: none;"></td></tr>
            <tr style="height:50px;">
                <td style="width: 35%; border: none; vertical-align: top;"></td>
                <td style="width: 5%; border: none; vertical-align: top;"></td>
                <td style="width: 58%; border: none; vertical-align: top; text-align: justify;">
                    3.&ensp;&ensp;&ensp;Melaksanakan perintah ini dengan seksama dan penuh rasa tanggung jawab.
                </td>
            </tr>
            <tr style="height:10px;"><td style="border: none;"></td></tr>
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
                <td style="border: none;"></td>
            </tr>
            <tr>
                <td style="border: none;" colspan="3">
                    <hr style="width: 50%;">
                </td>
            </tr>
            <tr>
                <td style="border: none;" align="center" valign="bottom" colspan="3">Rektor</td>
            </tr>
            
            <tr height="80px">
                <td style="border: none;" align="center" valign="bottom" colspan="3">
                    <img src="{{ asset('assets/img/ttd.png')}}" alt="ttd"><br>
                    Arief Efendi, S.Kep., Ns., MM., M.Kes</td>
            </tr>
            <tr>
                <td style="border: none;" align="center" valign="bottom" colspan="3">NIDK. 8807901019</td>
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
</body>

<script>
   window.onload=function(){
        event.preventDefault();
        /* Act on the event */
        window.print();
    }
</script>
</html>
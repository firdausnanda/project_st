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
            font-size: 16px;
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
                    <tr style="border-color:black;">
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
                    <tr style="border-color:black;">
                        <td colspan="3"></td>
                    </tr>
                </table>

                    <h3 id="judul">Rekap Data Matakuliah</h3>

                    <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th width="15%">Kode Matakuliah</th>
                                <th width="25%">Nama Matakuliah</th>
                                <th width="5%">SKS</th>
                                <th width="5%">T</th>
                                <th width="5%">P</th>
                                <th width="5%">K</th>
                                <th width="35%">Team Teaching</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach ($rekapmatkul as $m)
                            <?php 
                                $no++ ;
                            ?>
                            <tr style="font-size: 12px;">
                                <td width="5%" align="center">{{ $no }}</td>
                                <td width="15%">{{ $m->kode_matkul }}</td>
                                <td width="25%">{{ $m->nama_matkul }}</td>
                                <td width="5%" align="center">{{ $m->sks }}</td>
                                <td width="5%" align="center">{{ $m->t }}</td>
                                <td width="5%" align="center">{{ $m->p }}</td>
                                <td width="5%" align="center">{{ $m->k }}</td>
                                <td width="35%">
                                @php
                                    $data = explode("@" , $m->nama);
                                    foreach ($data as $key => $dataa) {
                                    echo "<li style='margin: 5px;'>".$dataa."</li>";
                                    }
                                    echo "<br>";
                                @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
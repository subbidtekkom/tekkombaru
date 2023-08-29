<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        @page {
            size: landscape;
        }
    </style>
</head>

<body>
    <div class="form-group" style="font-size:14px;">
        <p align="center"><b>Laporan Surat Masuk Bulan {{ date('F', mktime(0, 0, 0, $bulan, 1)) }}</b></p>
        <table id="customers">
            <tr>
                <th>No</th>
                <th>Nomor Agenda</th>
                <th>Nomor Surat</th>
                <th>Jenis Surat</th>
                <th>Surat Dari</th>
                <th>Perihal</th>
                <th>KKA</th>
                <th>Tanggal dan Jam Diterima Surat</th></th>
                <th>Disposisi</th>
                <th>Distribusi</th>
                <th>Isi Disposisi</th>
                <th>Keterangan</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td scope="row">{{ $row->nomor_agenda }}</td>
                    <td>{{ $row->nomor_surat }}</td>
                    <td>{{ $row->jenis_surat }}</td>
                    <td>{{ $row->asal_surat }}</td>
                    <td>{{ $row->perihal }}</td>
                    <td>{{ $row->kka }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime($row->tanggal_surat.' '.$row->jam_terima)) }}</td>
                    {{-- <td>{{ $row->jam_terima }}</td> --}}
                    <td>{{ $row->disposisi_kepada }}</td>
                    <td>{{ $row->distribusi }}</td>
                    <td>{{ $row->isi_disposisi }}</td>
                    <td>{{ $row->keterangan }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</body>

</html>

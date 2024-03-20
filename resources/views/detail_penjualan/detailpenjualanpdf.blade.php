<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 6px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 8px;
            padding-bottom: 8px;
            text-align: left;
            background-color: #1f0add;
            color: white;
        }
    </style>
</head>

<body>
 
    <h1>Data Detail Penjualan</h1>

    <table id="customers">
        <tr>
            <th>No.</th>
            <th>Jumlah Jual</th>
            <th>Harga Jual</th>
            <th>Sub Total Jual</th>
            <th>No. Penjualan</th>
            <th>Nama Obat</th>
        </tr>
        
        @php
            $no=1;
        @endphp
        @foreach ($detail_penjualan as $dpl)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $dpl->jumlah_jual }}</td>
            <td>{{ $dpl->harga_jual }}</td>
            <td>{{ $dpl->sub_total_jual }}</td>
            <td>{{ $dpl->fpenjualan->nonota_jual }}</td>
            <td>{{ $dpl->fobat->nama_obat }}</td>
        </tr>
        @endforeach
        
    </table>

</body>

</html>

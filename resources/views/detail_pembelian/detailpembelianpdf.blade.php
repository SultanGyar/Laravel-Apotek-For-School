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

    <h1><center>Data Detail Pembelian</center></h1>


    <table id="customers">
        <tr>
            <th>No.</th>
            <th>ID Pembelian</th>
            <th>Tanggal Kadarluarsa</th>
            <th>Harga Beli</th>
            <th>Jumlah Beli</th>
            <th>Sub Total Beli</th>
            <th>Persen margin Jual</th>
            <th>Id Obat</th>
        </tr>

        @php
            $no = 1;
        @endphp
        @foreach ($detail_pembelian as $dpb)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dpb->id_pembelian }}</td>
                <td>{{ $dpb->tgl_kadarluarsa }}</td>
                <td>{{ $dpb->harga_beli }}</td>
                <td>{{ $dpb->jumlah_beli }}</td>
                <td>{{ $dpb->sub_total_beli }}</td>
                <td>{{ $dpb->persen_margin_jual }}</td>
                <td>{{ $dpb->id_obat }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>

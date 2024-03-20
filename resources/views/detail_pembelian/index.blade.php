@extends('adminlte::page')
@section('title', 'List Detail Pembelian')
<link rel="shortcut icon" href="images/favicon.png" type="">
@section('content_header')
<h1 class="m-0 text-dark">List Detail Pembelian</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('detail_pembelian.create')}}" class="btn btn-primary mb-2">Tambah</a>
                <a href="/exportpdf3" class="btn btn-danger mb-2">Export Pdf</a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Obat</th>
                            <th>Harga Beli</th>
                            <th>Jumlah Beli</th>
                            <th>Persen Margin Jual</th>
                            <th>Sub Total Beli</th>
                            <th>No. Pembelian</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_pembelian as $key => $depe)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$depe->fobat->nama_obat}}</td>
                            <td>{{$depe->harga_beli}}</td>
                            <td>{{$depe->jumlah_beli}}</td>
                            <td>{{$depe->persen_margin_jual}}</td>
                            <td>{{$depe->sub_total_beli}}</td>
                            <td>{{$depe->fpembelian->nonota_beli}}</td>
                            <td>{{$depe->tgl_kadarluarsa}}</td>
                            <td>
                                <a href="{{route('detail_pembelian.edit', $depe)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('detail_pembelian.destroy', $depe)}}" onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
$('#example2').DataTable({
    "responsive": true,
});

function notificationBeforeDelete(event, el, dt) {
    event.preventDefault();
    if (confirm('Apakah anda yakin akan menghapus data detail pembelian ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
    }
}
</script>
@endpush
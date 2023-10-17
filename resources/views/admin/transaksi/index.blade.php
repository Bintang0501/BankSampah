@extends("layouts.app")

@section("title", "Transaksi")

@section("css")

<link rel="stylesheet" href="{{ url('') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

@endsection

@section("title_breadcrumb", "Transaksi")

@section("breadcrumb")

<ol class="breadcrumb">
    <li class="active">
        Dashboard
    </li>
</ol>

@endsection

@section("content")

@if (session("message_success"))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>
        <i class="icon fa fa-check"></i> Berhasil!
    </h4>
    {!! session("message_success") !!}
</div>
@elseif(session("message_error"))

@endif

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">
                    Data Transaksi Bank Sampah
                </h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Jenis Sampah</th>
                                <th class="text-center">Harga</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Status</th>
                                <th>Lama Penyimpanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["jenis_sampah"]["nama"] }}</td>
                                <td class="text-center">Rp. {{ number_format($item["jenis_sampah"]["harga"]) }} </td>
                                <td>{{ $item["jenis_sampah"]["deskripsi"] }}</td>
                                <td class="text-center">
                                    @if ($item["status"] == "0")
                                        <span class="badge badge-warning">
                                            PENDING
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $item["jenis_sampah"]["lama_penyimpanan"] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("js")

<script src="{{ url('') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

@endsection
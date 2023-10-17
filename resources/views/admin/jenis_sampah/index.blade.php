@extends("layouts.app")

@section("title", "Jenis Sampah")

@section("css")

<link rel="stylesheet" href="{{ url('') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

@endsection

@section("title_breadcrumb", "Master Jenis Sampah")

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
                <button type="button" class="btn btn-primary btn-sm btn-social" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th class="text-center">Harga</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis_sampah as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["nama"] }}</td>
                                <td class="text-center">Rp. {{ number_format($item["harga"]) }} </td>
                                <td>{{ $item["deskripsi"] }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm btn-social" data-toggle="modal" data-target="#modal-default-edit-{{ $item["id"] }}">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ url('/admin/jenis_sampah/'.$item["id"]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Apakah Yakin Anda Ingin Menghapus Data Ini ? ')" type="submit" class="btn btn-danger btn-social btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data
                </h4>
            </div>
            <form action="{{ url('/admin/jenis_sampah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga"> Harga </label>
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="0" min="1000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lama_penyimpanan"> Lama Penyimpanan </label>
                                <input type="number" class="form-control" name="lama_penyimpanan" id="lama_penyimpanan" placeholder="0" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto"> Foto </label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"> Deskripsi </label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi"  rows="5" placeholder="Masukkan Deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-social btn-sm pull-left">
                        <i class="fa fa-trash"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary btn-social btn-sm">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- EDIT -->
@foreach ($jenis_sampah as $index)
<div class="modal fade" id="modal-default-edit-{{ $index["id"] }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i> Edit Data
                </h4>
            </div>
            <form action="{{ url('/admin/jenis_sampah/'.$index["id"]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_e"> Nama </label>
                        <input type="text" class="form-control" name="nama_e" id="nama_e" placeholder="Masukkan Nama" value="{{ $index["nama"] }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_e"> Harga </label>
                        <input type="number" class="form-control" name="harga_e" id="harga_e" placeholder="0" min="1000" value="{{ $index["harga"] }}">
                    </div>
                    <div class="form-group">
                        <label for="foto_e"> Foto </label>
                        <br>
                        <img src="{{ url('/storage/'.$index["foto"]) }}" style="width: 300px; height: 300px;" alt="">
                        <br><br>
                        <input type="file" class="form-control" name="foto_e" id="foto_e">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_e"> Deskripsi </label>
                        <textarea name="deskripsi_e" class="form-control" id="deskripsi_e"  rows="5" placeholder="Masukkan Deskripsi">{{ $index["deskripsi"] }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-social btn-sm pull-left">
                        <i class="fa fa-trash"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary btn-social btn-sm">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END -->

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
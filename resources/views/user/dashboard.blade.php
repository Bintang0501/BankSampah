@extends("layouts.app")

@section("title", "Dashboard User")

@section("title_breadcrumb", "Dashboard User")

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
@endif

@if (session("data"))
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-search"></i> Data Bank Sampah
                </h3>
                <div class="pull-right">
                    <a href="{{ url('/') }}" class="btn btn-danger btn-sm btn-social">
                        <i class="fa fa-times"></i> Inputkan Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Jenis Sampah</td>
                            <td>:</td>
                            <td>
                                {{ session("data")->jenis_sampah->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>
                                Rp. {{ number_format(session("data")->jenis_sampah->harga) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td>
                                {{ session("data")->jenis_sampah->deskripsi }}
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td>
                                <img src="{{ url('/storage/'.session("data")->jenis_sampah->foto) }}" style="width: 300px; height: 300px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <span class="badge badge-warning">
                                    PENDING
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>:</td>
                            <td>
                                Rp. {{ number_format(session("data")->jenis_sampah->harga * session("data")->jumlah) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Lama Penyimpanan Sampah</td>
                            <td>:</td>
                            <td>
                                {{ session("data")->jenis_sampah->lama_penyimpanan }} Hari
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-bar-chart"></i> Data Grafik
                    </h3>
                </div>
                <div class="box-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("js")

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    const ctx = document.getElementById("myChart");

    const labels = @json($labels);
    const transaksi = @json($transaksi);

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Monitoring Bank Sampah Keseluruhan",
                data: transaksi,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    })
</script>

@endsection
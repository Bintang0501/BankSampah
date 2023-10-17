@extends("layouts.app")

@section("title", "Dashboard Admin")

@section("title_breadcrumb", "Dashboard Admin")

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
    <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $jenis_sampah }}
                </h3>
                <p>Jenis Sampah</p>
            </div>
            <div class="icon">
                <i class="fa fa-edit"></i>
            </div>
            <a href="{{ url('/admin/jenis_sampah') }}" class="small-box-footer"> Selengkapnya
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>150</h3>
                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"> Selengkapnya
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

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
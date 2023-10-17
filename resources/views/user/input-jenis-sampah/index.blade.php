@extends("layouts.app")

@section("title", "Input Jenis Sampah")

@section("css")

<link rel="stylesheet" href="{{ url('') }}/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="{{ url('') }}/dist/css/AdminLTE.min.css">

<link rel="stylesheet" href="{{ url('') }}/dist/css/skins/_all-skins.min.css">


@endsection

@section("content")

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-plus"></i> Input Jenis Sampah
                </h3>
            </div>
            <form action="{{ url('/input-jenis-sampah') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_sampah"> Jenis Sampah </label>
                                <select name="jenis_sampah" class="form-control select2" id="jenis_sampah">
                                    <option value="">- Pilih -</option>
                                    @foreach ($jenis_sampah as $item)
                                        <option value="{{ $item["id"] }}" data-harga="{{ $item["harga"] }}" data-nama="{{ $item["nama"] }}" data-deskripsi="{{ $item["deskripsi"] }}" data-gambar="{{ $item["foto"] }}">
                                            {{ $item["nama"] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah"> 
                                    Jumlah Sampah 
                                    <small class="text-danger" style="color: red">
                                        <i>
                                            /kg
                                        </i>
                                    </small>
                                </label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="0" min="1">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="width: 150px">Jenis Sampah</td>
                                <td class="text-center" style="width: 50px">:</td>
                                <td class="nama_jenis" id="nama_jenis">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Harga</td>
                                <td class="text-center" style="width: 50px">:</td>
                                <td class="harga" id="harga">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Deskripsi</td>
                                <td class="text-center" style="width: 50px">:</td>
                                <td class="deskripsi" id="deskripsi">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px">Foto</td>
                                <td class="text-center" style="width: 50px">:</td>
                                <td class="foto" id="foto">
                                    -
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button type="submit" id="hitungButton" style="display: none" class="btn btn-success btn-sm btn-social">
                        <i class="fa fa-edit"></i> Proses
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section("js")

<script src="{{ url('') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('.select2').select2()
    })

    let selectHarga = document.getElementById("jenis_sampah");
    let inputJumlah = document.getElementById("jumlah");
    let harga = document.getElementById("harga");
    let jenis_nama = document.getElementById("nama_jenis");
    let deskripsi = document.getElementById("deskripsi");
    let foto = document.getElementById("foto");
    let hitungButton = document.getElementById("hitungButton");

    selectHarga.addEventListener("change", hitungHargaTotal);
    inputJumlah.addEventListener("input", hitungHargaTotal);

    function hitungHargaTotal() {
        let selectedOption = selectHarga.options[selectHarga.selectedIndex];
        let selectedHarga = selectedOption.getAttribute("data-harga");
        let namaJenis = selectedOption.getAttribute("data-nama");
        let desc = selectedOption.getAttribute("data-deskripsi");
        let gambar = selectedOption.getAttribute("data-gambar");
        let jumlah = inputJumlah.value;

        if (selectedHarga && jumlah) {
            let totalHarga = selectedHarga;
            harga.textContent = formatRupiah(totalHarga, "Rp. ");
        } else {
            harga.textContent = "0";
        }

        if (namaJenis) {
            jenis_nama.textContent = namaJenis;
        } else {
            jenis_nama.textContent = "-";
        }

        if (desc) {
            deskripsi.textContent = desc;
        } else {
            deskripsi.textContent = "-";
        }

        if (gambar) {
            foto.innerHTML = '<img style="width: 300px; height: 300px" src="storage/' + gambar + '" alt="Gambar Jenis Sampah">';
        } else {
            foto.innerHTML = '<img src="" alt="Gambar Jenis Sampah">';
        }

        if (selectedOption && selectedOption.value && jumlah) {
            hitungButton.style.display = "block";
        } else {
            hitungButton.style.display = "none";
        }
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, '');
        var split = number_string.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

</script>

@endsection
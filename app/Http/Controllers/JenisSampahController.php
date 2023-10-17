<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisSampahController extends Controller
{
    public function index()
    {
        $data["jenis_sampah"] = JenisSampah::orderBy("created_at", "DESC")->get();

        return view("admin.jenis_sampah.index", $data);
    }

    public function store(Request $req)
    {
        return DB::transaction(function() use ($req) {

            $data = $req->file("foto")->store("jenis_sampah");

            JenisSampah::create([
                "nama" => $req->nama,
                "deskripsi" => $req->deskripsi,
                "harga" => $req->harga,
                "foto" => $data,
                "lama_penyimpanan" => $req->lama_penyimpanan
            ]);

            return redirect("/admin/jenis_sampah")->with("message_success", "Data Berhasil di Tambahkan");
        });
    }

    public function update(Request $req, $id)
    {
        return DB::transaction(function() use ($req, $id) {
            JenisSampah::where("id", $id)->update([
                "nama" => $req->nama_e,
                "deskripsi" => $req->deskripsi_e,
                "harga" => $req->harga_e,
            ]);

            return redirect("/admin/jenis_sampah")->with("message_success", "Data Berhasil di Simpan");
        });
    }

    public function destroy($id)
    {
        return DB::transaction(function() use ($id) {
            JenisSampah::where("id", $id)->delete();

            return back()->with("message_success", "Data Berhasil di Hapus");
        });
    }
}

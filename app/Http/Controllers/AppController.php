<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function input_jenis_sampah()
    {
        $data["jenis_sampah"] = JenisSampah::get();

        return view("user.input-jenis-sampah.index", $data);
    }

    public function dashboard_admin()
    {
        $data = [
            "jenis_sampah" => JenisSampah::count()
        ];

        $jenis_sampah = JenisSampah::get();

        $labels = $jenis_sampah->pluck("nama")->toArray();

        $id = $jenis_sampah->pluck("id")->toArray();

        $transaksi = [];
        foreach ($id as $i) {
            $jumlahTransaksi = Transaksi::where("jenis_sampah_id", $i)->count();
            $transaksi[] = $jumlahTransaksi;
        }

        return view("admin.dashboard", $data, ["labels" => $labels, "transaksi" => $transaksi]);
    }

    public function post_jenis_sampah(Request $req)
    {
        return DB::transaction(function() use ($req) {
            $transaksi = Transaksi::create([
                "jenis_sampah_id" => $req->jenis_sampah,
                "status" => 0,
                "jumlah" => $req->jumlah 
            ]);

            return redirect("/dashboard")
                ->with("message_success", "Data Berhasil di Proses")
                ->with("data", $transaksi);
        });
    }

    public function dashboard_user()
    {
        $jenis_sampah = JenisSampah::get();

        $labels = $jenis_sampah->pluck("nama")->toArray();

        $id = $jenis_sampah->pluck("id")->toArray();

        $transaksi = [];
        foreach ($id as $i) {
            $jumlahTransaksi = Transaksi::where("jenis_sampah_id", $i)->count();
            $transaksi[] = $jumlahTransaksi;
        }


        return view("user.dashboard", ["labels" => $labels, "transaksi" => $transaksi]);
    }

    public function transaksi()
    {
        $data["transaksi"] = Transaksi::get();

        return view("admin.transaksi.index", $data);
    }
}

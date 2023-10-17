<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AutentikasiController extends Controller
{
    public function login()
    {
        return view("authentication.login.index");
    }

    public function post_login(Request $req)
    {
        $pesan = [
            "required" => "Kolom :attribute Tidak Boleh Kosong",
            "email" => "Kolom :attribute Harus Disertai @",
            "min" => "Kolom :attribute Minimal Harus :min Digit"
        ];

        $this->validate($req, [
            "email" => "required|email",
            "password" => "required|min:8",
        ], $pesan);

        return DB::transaction(function () use ($req) {

            $cek = User::where("email", $req->email)->first();

            if ($cek) {
                if (Hash::check($req->password, $cek->password)) {
                    if (Auth::attempt(["email" => $req->email, "password" => $req->password])) {
                        $req->session()->regenerate();
        
                        return redirect("/admin/dashboard")->with("message_success", "Anda Berhasil Login");
                    } else {
                        return redirect("/login")->with("message_error", "Maaf, Data Tidak Ditemukan");
                    }
                } else {
                    return redirect("/login")->with("message_error", "Password Anda Salah")->withInput();
                }
            } else {
                return redirect("/login")->with("message_error", "Maaf, Data Tidak Ditemukan");
            }
            

        });
    }

    public function logout()
    {
        return DB::transaction(function() {
            Auth::logout();

            return redirect("/login");
        });
    }
}

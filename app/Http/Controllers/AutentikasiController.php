<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutentikasiController extends Controller
{
    public function login()
    {
        return view("authentication.login.index");
    }

    public function post_login(Request $req)
    {
        return DB::transaction(function () {
            echo "ada";
        });
    }
}

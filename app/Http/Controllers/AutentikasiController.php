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

    public function data()
    {
        return DB::transaction() use ()
    }
}

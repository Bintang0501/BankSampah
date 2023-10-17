<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasUuids, HasFactory;

    protected $table = "transaksi";

    protected $guarded = [''];

    public function jenis_sampah()
    {
        return $this->belongsTo("App\Models\JenisSampah", "jenis_sampah_id", "id");
    }
}

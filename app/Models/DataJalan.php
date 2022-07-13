<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_latitude',
        'start_longitude',
        'end_latitude',
        'end_longitude',
        'level_jalan',
        'kecepatan',
        'status_verifikasi',
        'nama_penginput'
    ];
}

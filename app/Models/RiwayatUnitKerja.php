<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatUnitKerja extends Model
{
    use HasFactory;

    protected $table = 'riwayat_unit_kerja';

    protected $fillable = [
        'id_user', 'id_unit_kerja', 'tanggal_berakhir', 'nip_pengubah'
    ];
}

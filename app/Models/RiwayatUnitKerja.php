<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatUnitKerja extends Model
{
    use HasFactory;

    protected $table = 'riwayat_unit_kerja';

    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip', 'id_unit_kerja', 'tanggal_berakhir', 'nip_pengubah'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nip');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja', 'id_unit_kerja');
    }
}

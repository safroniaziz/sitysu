<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';

    // protected $primaryKey = 'id_unit_kerja';

    protected $fillable = ['id_unit_kerja', 'nama_departemen'];

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('id_unit_kerja', 'like', '%' . $val . '%')
            ->Orwhere('nama_departemen', 'like', '%' . $val . '%');
    }
}

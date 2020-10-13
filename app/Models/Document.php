<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'nama_surat', 'no_surat', 'penandatangan', 'ditetapkan', 'jenis_surat'];

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('nama_surat', 'like', '%' . $val . '%')
            ->Orwhere('no_surat', 'like', '%' . $val . '%')
            ->Orwhere('penandatangan', 'like', '%' . $val . '%');
    }
}

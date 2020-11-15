<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $primaryKey = 'id_surat';

    protected $fillable = [
        'id_surat', 'no_surat', 'tentang', 'deskripsi_surat', 'jenis_surat', 'tanggal_surat', 'tanggal_mulai',
        'tanggal_akhir', 'link_file', 'link_download', 'pejabat', 'jabatan_pejabat', 'id_user'
    ];

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('tentang', 'like', '%' . $val . '%')
            ->Orwhere('no_surat', 'like', '%' . $val . '%')
            ->Orwhere('pejabat', 'like', '%' . $val . '%');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'penerima_surat', 'id_surat', 'id_user');
    }
}

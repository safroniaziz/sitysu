<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip', 'nama', 'status', 'password', 'jenis_kelamin', 'alamat', 'no_hp', 'nidn', 'id_unit_kerja',
        'hak_akses', 'foto_profil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('nama', 'like', '%' . $val . '%')
            ->Orwhere('nip', 'like', '%' . $val . '%');
    }

    public function scopeFilter($query, $val)
    {
        if ($val == 'semua') {
            return $query
                ->where('hak_akses', 'admin')
                ->orWhere('hak_akses', 'dosen')
                ->orWhere('hak_akses', 'staf');
        } else {
            return $query
                ->where('hak_akses', $val);
        }
    }

    public function getrouteRouteKeyName()
    {
        return 'nip';
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja', 'id_unit_kerja');
    }

    public function surat()
    {
        return $this->belongsToMany(Surat::class, 'penerima_surat', 'id_user', 'id_surat');
    }
}

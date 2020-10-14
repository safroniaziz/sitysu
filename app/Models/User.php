<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nip_nidn', 'role', 'password',
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
            ->Orwhere('nip_nidn', 'like', '%' . $val . '%');
    }

    public function scopeFilter($query, $val)
    {
        if ($val == 'semua') {
            return $query
                ->where('role', 'admin')
                ->orWhere('role', 'dosen')
                ->orWhere('role', 'staf');
        } else {
            return $query
                ->where('role', $val);
        }
    }

    public function getrouteRouteKeyName()
    {
        return 'nip_nidn';
    }
}

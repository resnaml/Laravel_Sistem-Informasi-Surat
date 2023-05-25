<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\AuthManager;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'username',
    //     'jabatan',
    //     'alamat',
    //     'gambar'
    // ];

    protected $guarded = ['id'];

    /*
        Relation
    **/
    public function suratkeluar()
    {
        return $this->hasMany(Suratkeluar::class);
    }

    // public function suratmasuk()
    // {
    //     return $this->hasMany(Suratmasuk::class,'suratmasuk_id');
    // }

    public function kepada_surat()
    {
        return $this->hasOne(Suratkeluar::class,'kepada');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

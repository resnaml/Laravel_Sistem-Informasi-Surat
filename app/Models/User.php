<?php

namespace App\Models;

use Illuminate\Auth\AuthManager;

use App\Models\Nip;
use App\Models\Suratkeluar;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'id',
    //     'email',
    //     'password',
    //     'username',
    //     'nip',
    //     'is_admin',
    //     'nip_id'
    // ];
    // protected $fillable =['nip_id'];

    protected $guarded = ['id'];

    /*
        Relationship
    */
    public function suratkeluar()
    {
        return $this->hasMany(Suratkeluar::class);
    }

    public function nips_id(){
        return $this->belongsTo(Nip::class,'nip_id');
    }

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

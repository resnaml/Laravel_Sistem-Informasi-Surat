<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nip extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function nip(){
        return $this->hasOne(User::class,'nip_id');
    }

}

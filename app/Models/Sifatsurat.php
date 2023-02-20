<?php

namespace App\Models;
use App\Models\Suratkeluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sifatsurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function suratkeluar()
    {
        return $this->hasMany(Suratkeluar::class);
    }

}

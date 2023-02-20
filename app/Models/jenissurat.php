<?php

namespace App\Models;
use App\Models\Suratkeluar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jenissurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function suratkeluar()
    {
        return $this->hasMany(Suratkeluar::class);
    }
}

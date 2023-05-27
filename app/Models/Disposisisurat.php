<?php

namespace App\Models;
use App\Models\Suratkeluar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisisurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $status = ['Diterima', 'Proses', 'Ditolak'];

    public function disposisi()
    {
        return $this->belongsTo(Suratkeluar::class);
    }

}

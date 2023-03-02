<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisisurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $status = ['Diterima', 'Proses', 'Ditolak'];
    
    public function suratkeluar()
    {
        return $this->belongsTo(Suratkeluar::class, 'disposisi_id');
    }

}

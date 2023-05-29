<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $table = 'suratmasuks';

    // protected $fillable= ['no_surat_masuk','tgl_surat_masuk','lampiran','perihal','penerima_surat','sifat_id','jenissurat_id','user_id','suratkeluar_id'];

    // public function jenissurat()
    // {
    //     return $this->belongsTo(jenissurat::class,'jenissurat_id');
    // }
    // public function sifatsurat()
    // {
    //     return $this->belongsTo(Sifatsurat::class,'sifat_id');
    // }
    // public function user()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }
    // public function disposisi()
    // {
    //     return $this->hasOne(Disposisisurat::class,'disposisi_id');
    // }
}

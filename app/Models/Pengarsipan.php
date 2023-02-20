<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarsipan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategoriarsip::class, 'kategori_arsip_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->kodearsip = Pengarsipan::where('kategori_arsip_id', $model->kategori_arsip_id)->max('kodearsip') + 1 ;
        });
    }

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}

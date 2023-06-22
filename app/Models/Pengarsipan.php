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

    public function scopeFilter($query,array $filters) 
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return  $query
            ->where('full_kode', 'like', '%'. $search. '%')->orwhere('judul', 'like', '%'. $search. '%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $kategori) {
            return $query->whereHas('kategori', function($query) use($kategori) {
                $query->where('kode_arsip', $kategori);
            });
        });
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->kodearsip = Pengarsipan::where('kategori_arsip_id', $model->kategori_arsip_id)->max('kodearsip') + 1;
            $model->full_kode = $model->kategori['kode_arsip'] . '-' . str_pad($model->kodearsip, 4, '0', STR_PAD_LEFT);
        });
    }

}

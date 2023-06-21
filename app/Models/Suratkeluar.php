<?php

namespace App\Models;

use App\Models\Sifatsurat;
use App\Models\jenissurat;
use App\Models\User;
use App\Models\Disposisisurat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\App;

class Suratkeluar extends Model
{
    use HasFactory;
    // use HasTrixRichText;

    protected $guarded = ['id'];
    
    protected $table = 'suratkeluars';

    protected $with = ['sifatsurat','user','jenissurat','disposisi'];

    /* Search untuk status surat */
    public function scopeFilter($query, array $filters)
    {
            $query->when($filters['search'] ?? false, function($query, $search) {
                return  $query
                ->where('no_surat_keluar', 'like', '%'. $search. '%')->orwhere('full_number', 'like', '%'. $search. '%');
            });

            $query->when($filters['jenissurat'] ?? false, function($query, $jenissurat) {
                return $query->whereHas('jenissurat', function($query) use($jenissurat) {
                    $query->where('kodesurat', $jenissurat);
                });
            });
    }

    // protected $fillable= ['no_surat_keluar','tgl_surat_keluar','lampiran','perihal','penerima_surat','sifat_id','jenissurat_id'];

    public function jenissurat()
    {
        return $this->belongsTo(jenissurat::class,'jenissurat_id');
    }
    public function sifatsurat()
    {
        return $this->belongsTo(Sifatsurat::class,'sifat_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function disposisi()
    {
        return $this->hasOne(Disposisisurat::class,'disposisi_id');
    }

    public function kepada_id()
    {
        return $this->belongsTo(User::class,'kepada');
    }
    
    // public function sluggable(): array
    // {
    //     return [
    //         'no_surat_keluar' => [
    //             'source' => ['jenissurat_id.kodesurat'],
    //             'separator' => '_' + 1
    //         ]
    //     ];
    // }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->no_surat_keluar = Suratkeluar::where('jenissurat_id', $model->jenissurat_id)->max('no_surat_keluar') + 1;
            $model->full_number = $model->jenissurat['kodesurat'] . '-' . str_pad($model->no_surat_keluar, 4, '0', STR_PAD_LEFT);
        });
    }
}

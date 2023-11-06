<?php

namespace App\Models;

use App\Models\Sifatsurat;
use App\Models\jenissurat;
use App\Models\User;
use App\Models\Disposisisurat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Suratkeluar extends Model
{
    use HasFactory,SoftDeletes;
    // use HasTrixRichText;

    protected $guarded = ['id'];
    
    protected $table = 'suratkeluars';

    protected $with = ['sifatsurat','user','jenissurat','disposisi'];

    /* Search untuk status surat */
    public function scopeFilter($query, array $filters)
    {
            $query->when($filters['search'] ?? false, function($query, $search) {
                return  $query
                ->where('no_surat_keluar', 'like', '%'. $search. '%')->orwhere('full_number', 'like', '%'. $search. '%')
                ->orwhere('status', 'like', '%'. $search. '%');
            });

            $query->when($filters['jenissurat'] ?? false, function($query, $jenissurat) {
                return $query->whereHas('jenissurat', function($query) use($jenissurat) {
                    $query->where('kodesurat', $jenissurat);
                });
            });
    }

    public function scopePersetujuan($query){
        return $query->with('sifatsurat','jenissurat')->where('acc_admin', false)->get()->map(function($q){
            return [
                'id' => $q->id,
                'title' => $q->full_number,
                'created_at' => $q->created_at->diffForHumans(),
                'sifat' => $q->sifatsurat->namesifat,
                'pembuat' => $q->user->username
            ];
        });
    }

    public function scopeDisposisiKepala($query){
        return $query->where('acc_admin', 1)->where('print_surat', 1)->where('disposisi_isi', 0)->get()->map(function($q){
            return [
                'id' => $q->id,
                'full_number' => $q->full_number
            ];
        });
    }


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

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->no_surat_keluar = Suratkeluar::where('jenissurat_id', $model->jenissurat_id)->max('no_surat_keluar') + 1;
            $model->full_number = $model->jenissurat['kodesurat'] . '-' . str_pad($model->no_surat_keluar, 4, '0', STR_PAD_LEFT);
        });
    }
}

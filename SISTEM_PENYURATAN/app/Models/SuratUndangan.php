<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;  

class SuratUndangan extends Model
{
    use HasFactory;

    protected $table = 'surat_undangans';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])
                ->translatedFormat('l, d F Y');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
                ->translatedFormat('l, d F Y');
    }
}

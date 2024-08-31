<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SuratPindah extends Model
{
    use HasFactory;
    protected $table = 'surat_pindahs';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getTanggalSuratAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_surat'])
                ->translatedFormat('l, d F Y');
    }
}

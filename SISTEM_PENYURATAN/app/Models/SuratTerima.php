<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SuratTerima extends Model
{
    use HasFactory;
    protected $table = 'surat_terimas';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
                ->translatedFormat('l, d F Y');
    }
}

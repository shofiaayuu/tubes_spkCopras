<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatif';
    protected $fillable = [
        'kode',
        'nama'
    ];

    public function kriteria()
    {
        return $this->hasMany(AlternatifKriteria::class, 'id_alternatif');
    }}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['kategori_id', 'judul', 'penulis', 'penerbit', 'tahun', 'foto'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}

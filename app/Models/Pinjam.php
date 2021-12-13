<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjam';
    protected $fillable = ['buku_id', 'pengunjung_id', 'tgl_pinjam', 'tgl_kembali', 'status'];

    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function pengunjung(){
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }
}

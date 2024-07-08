<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjam extends Model
{
    use HasFactory;
    protected $fillable = ['id_peminjam', 'id_buku', 'tanggal_pinjam', 'tanggal_pengembalian', 'keterangan'];
    public function anggota (){
        return $this->belongsTo(Anggota::class, 'id_peminjam', 'id');
    }
    public function buku (){
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}

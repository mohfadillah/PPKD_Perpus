<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $fillable = ['id_anggota', 'no_transaksi'];

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }
}

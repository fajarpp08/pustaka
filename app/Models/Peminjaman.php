<?php

namespace App\Models;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';

    protected $fillable = ['tgl_mulai', 'tgl_akhir', 'buku_id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}

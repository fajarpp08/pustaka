<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Buku extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['judul', 'penulis', 'sinopsis', 'gambar_buku', 'kategori_id'];
    // field apa saja yg wajib diisi
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
        // merelasikan model buku ke model kategori berdasarkan dari field kategori_id yang ada di tabel buku
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug');
    }
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
        // merelasikan model peminjaman kepada model buku sbg hasMany
    }
}

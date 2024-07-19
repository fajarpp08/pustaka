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

    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
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
    }
}

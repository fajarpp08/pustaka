<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';
    use HasFactory;
    use HasSlug;
    protected $guarded = [];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul_pengumuman')
            ->saveSlugsTo('slug');
    }
}

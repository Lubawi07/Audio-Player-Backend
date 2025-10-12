<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rupadana\ApiService\Contracts\HasAllowedIncludes;

class Songs extends Model implements HasAllowedIncludes
{
    protected $table = 'songs';
    protected $fillable = [
        'title',
        'cover_image',
        'artist_id',
        'album_id',
        'lyrics',
        'category_id',
        'file_music',
        'duration',
        'play_count'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public static function getAllowedIncludes(): array
    {
        // import model nya dari functionnya
        return [
            'artist',
            'album',
            'category'
        ];

    }

}

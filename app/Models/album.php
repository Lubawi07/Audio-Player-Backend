<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = [
        'title',
        'cover_image',
        'artist_id',
        'release_date'
    ];

    public function song (){
        return $this->hasMany(Songs::class);
    }
    public function artist(){
        return $this->belongsTo(Artist::class);
    }
}

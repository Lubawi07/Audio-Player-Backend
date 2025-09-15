<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artist';
    protected $fillable = [
        'cover_image',
        'name'
    ];

    public function song (){
        return $this->hasMany(Songs::class);
    }
    public function album (){
        return $this->hasMany(Album::class);
    }
}

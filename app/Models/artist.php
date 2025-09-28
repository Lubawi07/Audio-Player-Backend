<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artist';
    protected $fillable = [
        'cover_image',
        'name',
        'bio'
    ];

    public function song (){
        return $this->hasMany(Songs::class);
    }
    public function album (){
        return $this->hasMany(Album::class);
    }
}

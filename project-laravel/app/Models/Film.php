<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = "film";
    protected $fillable = ["title","summary", "year", "poster", "genre_id"];

    
    public function genre()
    {
        return $this->belongsTo(Genre::class, "genre_id");
    }

    public function review()
    {
        return $this->hasMany(Review::class, "film_id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
        
    protected $table = "genre";
    protected $fillable = ["name"];

    public function film()
    {
        return $this->hasMany(Film::class, "genre_id");
    }
}

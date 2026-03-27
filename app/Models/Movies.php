<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = "movies";

    protected $fillable = [
        'title'
    ];

    public function Rent()
    {
        return $this->hasMany(Rent::class, 'movie_id');
    }
}

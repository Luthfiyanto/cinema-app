<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = "rents";

    protected $fillable = [
        'user_id',
        'movie_id'
    ];

    public function User()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function Movies()
    {
        return $this->belongsTo(Movies::class, 'movie_id');
    }
}

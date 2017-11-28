<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'year', 'description', 'photo'];

    public function movieCategories()
    {
        return $this->belongsTo(\App\MovieCategories::class, 'categories_id');
    }
}

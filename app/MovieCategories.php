<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieCategories extends Model
{
	protected $fillable = ['categories'];

    protected $table = "categories";
}

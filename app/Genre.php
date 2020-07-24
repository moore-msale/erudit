<?php

namespace App;

use App\ModelFilters\GenreFilter;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $table = "genres";
    public function book()
    {
        return $this->belongsToMany(Book::class);
    }

    public function newCollection(array $models = [])
    {
        return new GenreFilter($models);
    }
}

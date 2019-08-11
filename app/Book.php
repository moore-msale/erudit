<?php

namespace App;

use App\ModelFilters\BookFilter;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function newCollection(array $models = [])
    {
        return new BookFilter($models);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}

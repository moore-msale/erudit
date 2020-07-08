<?php

namespace App;

use App\ModelFilters\BookFilter;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = "books";

//    public static function table(string $string)
//    {
//    }
    public static function table(string $string)
    {
    }

    public function newCollection(array $models = [])
    {
        return new BookFilter($models);
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function compilations()
    {
        return $this->hasMany(Compilation::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

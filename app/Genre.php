<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $table = "genres";
    public function book()
    {
        return $this->belongsToMany(Book::class);
    }
}

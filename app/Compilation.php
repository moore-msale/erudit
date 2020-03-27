<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Compilation extends Model
{
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}

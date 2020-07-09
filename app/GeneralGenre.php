<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralGenre extends Model
{
    public $table = "general_genre";
    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }
}

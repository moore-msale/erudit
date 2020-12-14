<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Compilation extends Model
{
    public $table = "compilations";
    protected $fillable = ['title', 'id', 'title_color', 'image', 'active'];
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Feedback extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}

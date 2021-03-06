<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parson extends Model
{
    protected $fillable = ['urlForParse', 'searchUrl', 'name_search', 'name_search_count', 'name_url', 'name_url_count',
        'author', 'author_count', 'excel', 'name', 'name_count', 'description', 'description_count', 'image', 'type', 'search_image',
        'isbn', 'isbn_count', 'genre', 'genre_count', 'price_wholesale', 'price_retail', 'isbn_custom'];
}

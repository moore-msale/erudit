<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 11.08.2019
 * Time: 22:16
 */

namespace App\ModelFilters;


use App\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookFilter extends Collection
{
    public function filterCollection(Request $request)
    {
        $model = $this;
        if ($search = $request->search) {
            $model = $this->searchFilter($model, $search);
        }
        if (($min = $request->min) && ($max = $request->max)) {
            $model = $this->rangeCost($model, $min, $max);
        }
        if ($sortName = $request->sortName) {
            $model = $this->sortByName($model, $sortName);
        }
        if ($sortPrice = $request->sortPrice) {
            $model = $this->sortByPrice($model, $sortPrice);
        }
        if ($genre = $request->genre) {
            $model = $this->filterByGenre($model, $genre);
        }
        if($category = $request->category) {
            $model = $this->filterByCategory($model, $category);
        }

        return $model;
    }

    public function filterByGenre($model, $genre)
    {
        return $model->where('genre_id', $genre);
    }

    public function filterByCategory ($model, $category)
    {
        return $model->where('category_id', $category);
    }

    public function searchFilter($model, $name)
    {
        return $model->where('name', 'like', ''.$name.'%');
    }

    public function rangeCost($model, $min, $max)
    {
        if (auth()->check()) {
            return $model->where('price_wholesale', '>=', $min)->where('price_wholesale', '<=', $max);
        }

        return $model->where('price_retail', '>=', $min)->where('price_retail', '<=', $max);
    }

    public function sortByPrice($model, $direction)
    {
        if ($direction == 'asc') {
            if (auth()->check()) {
                return $model->sortBy('price_wholesale');
            }
            return $model->sortBy('price_retail');
        } elseif ($direction == 'desc') {
            if (auth()->check()) {
                return $model->sortByDesc('price_wholesale');
            }
            return $model->sortByDesc('price_retail');
        }

        if (auth()->check()) {
            return $model->sortBy('price_wholesale');
        }
        return $model->sortBy('price_retail');
    }

    public function sortByName($model, $direction)
    {
        if ($direction == 'asc') {
            return $model->sortBy('name');
        } elseif ($direction == 'desc') {
            return $model->sortByDesc('name');
        }

        return $model->sortBy('name');
    }
}
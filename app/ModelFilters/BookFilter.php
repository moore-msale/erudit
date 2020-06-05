<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 11.08.2019
 * Time: 22:16
 */

namespace App\ModelFilters;


use App\Book;
use App\Feedback;
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
        if ($sortIssueDate = $request->sortIssueDate) {
            $model = $this->filterByIssueDate($model, $sortIssueDate);
        }
        if ($sortAuthor = $request->sortAuthor) {
            $model = $this->sortByAuthor($model, $sortAuthor);
        }
        if ($sortByDiscount = $request->sortByDiscount) {
            $model = $this->sortByDiscount($model, $sortByDiscount);
        }
        if ($sortByBestseller = $request->sortByBestseller) {
            $model = $this->sortByBestseller($model, $sortByBestseller);
        }
        if ($sortByReviewed = $request->sortByReviewed) {
            $model = $this->sortByReviewed($model, $sortByReviewed);
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
    public function sortByAuthor($model, $direction)
    {

        $model = $model->map(function($item){
          $item['author'] = mb_convert_case($item['author'],MB_CASE_TITLE, "UTF-8");
          return $item;
        });

        if ($direction == 'asc') {
            return $model->sortBy('author')->where('author','!=',null);
        } elseif ($direction == 'desc') {
            return $model->sortByDesc('author')->where('author','!=',null);
        }

        return $model->sortBy('author');
    }
    public function sortByDiscount($model, $direction)
    {

        if ($direction == 'asc') {
            return $model->sortBy('discount');
        } elseif ($direction == 'desc') {
            return $model->sortByDesc('discount');
        }
        return $model->sortBy('discount');
    }
    public function sortByBestseller($model, $direction)
    {
        if ($direction == 1) {
            return $model->where('bestseller',1);
        }
        return $model->sortBy('name');
    }
    public function sortByReviewed($model, $direction)
    {
        $feedbacks = Feedback::all()->pluck('book_id');
        if ($direction == 1) {
            return $model->find($feedbacks);
        }
        return $model->sortBy('name');
    }
    public function filterByIssueDate($model, $direction)
    {
        if ($direction == 'asc') {
            return $model->sortBy('issue_date');
        } elseif ($direction == 'desc') {
            return $model->sortByDesc('issue_date');
        }

        return $model->sortBy('issue_date');
    }
}

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
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Psr7\str;

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
        if($subgenre = $request->subgenre) {
            $model = $this->filterBySubgenre($model, $subgenre);
        }
        if($stationery = $request->stationery) {
            $model = $this->filterByStationery($model, $stationery);
        }

        return $model;
    }

    public function filterByStationery($model, $stationery)
    {
        $genre_stationery = [];
        $modelaa = DB::table('genres')
            ->select('id')
            ->where('name', 'like', '%' . $stationery . '%')->get();
        foreach ($modelaa as $key => $items) {
            foreach ($items as $key_value => $value) {
                array_push($genre_stationery, $value);
            }
        }
        return $model->whereIn('id', $genre_stationery);
    }

    public function filterBySubgenre($model, $stationery){
        if (strpos('all', $stationery) !== false) {
            return $model->where('category_id', '=', 1)->sortByDesc('recommend')->sortByDesc('discount');
        }else {
            
            $book_id = DB::table('books')
                ->select('*')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                ->where('genres.name', 'like', '%' . $stationery . '%')->pluck('isbn');

        }

            return $model->whereIn('isbn', $book_id)->where('category_id', 1)->sortByDesc('recommend')->sortByDesc('discount');
        }

    public function filterByGenre($model, $genre)
    {

        if (strpos('all', $genre) !== false){
                return $model->where('category_id', '=', 2)->sortByDesc('recommend')->sortByDesc('discount');

        }else{

            $book_id = DB::table('books')
                ->select('*')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                ->where('general_id', '=', $genre)->pluck('isbn');
        }

        return $model->whereIn('isbn', $book_id)->sortByDesc('discount')->sortByDesc('recommend')->unique('name');
    }

    public function filterByCategory ($model, $category)
    {
//        dd($model, $category, 'ddddddddddd');
        $books_stationery = [];
        $genre_stationery = [];
        $modelaa = DB::table('genres')
            ->select('id')
            ->where('name', 'like', '%' . $category . '%')->get();
        foreach ($modelaa as $key => $items) {
            foreach ($items as $key_value => $value) {
                array_push($genre_stationery, $value);
            }
        }
        $book_id = DB::table('books')
            ->select('*')
            ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
            ->whereIn('book_genre.genre_id', $genre_stationery)->get();


        foreach ($book_id as $key => $item) {
            foreach ($item as $key_value_2 => $value_2) {
                if ($key_value_2 == 'isbn') {
                    array_push($books_stationery, $value_2);
                }
            }

        }
//        dd($books_stationery);

        return $model->whereIn('isbn', $books_stationery);
    }

    public function searchFilter($model, $name)
    {
        $model = DB::table('books')
            ->select('*')
            ->where('name', 'LIKE', '%' . $name . '%')
            ->orWhere('isbn', 'LIKE', '%' . $name . '%')->get();
        return $model;

    }

    public function rangeCost($model, $min, $max)
    {
        if (auth()->check()) {
            return $model->where('price_retail', '>=', $min)->where('price_retail', '<=', $max);
        }

        return $model->where('price_wholesale', '>=', $min)->where('price_wholesale', '<=', $max);
    }

    public function sortByPrice($model, $direction)
    {
        if ($direction == 'asc') {
            if (auth()->check()) {
                return $model->sortBy('price_retail');
            }
            return $model->sortBy('price_wholesale');
        } elseif ($direction == 'desc') {
            if (auth()->check()) {
                return $model->sortByDesc('price_retail');
            }
            return $model->sortByDesc('price_wholesale');
        }

        if (auth()->check()) {
            return $model->sortBy('price_retail');
        }
        return $model->sortBy('price_wholesale');
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

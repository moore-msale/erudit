<?php
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
        if ($category_general = $request->category_general){
            $model = $this->categoryGeneral($model, $category_general);
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
                ->select('*')->from('books')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->whereIn('book_genre.genre_id', DB::table('genres')
                    ->select('id')->where('name', 'like', '%' . $stationery . '%')->pluck('id'))
                ->get()->unique('isbn')->sortByDesc('discount')->sortByDesc('recommend');

        }
        return collect($book_id);
//            return $model->whereIn('isbn', $book_id)->where('category_id', 1)->sortByDesc('recommend')->sortByDesc('discount');
        }

    public function filterByGenre($model, $genre)
    {

        if (strpos('all', $genre) !== false){
                return $model->where('category_id', '=', 2)->sortByDesc('recommend')->sortByDesc('discount');

        }else{

            $book_id = DB::table('books')
                ->select('*')->from('books')
                ->where('category_id', '=', 2)
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->whereIn('book_genre.genre_id', DB::table('genres')
                    ->select('id')->where('general_id', '=', $genre)->pluck('id'))
                ->get()->unique('isbn')->sortByDesc('discount')->sortByDesc('recommend');
        }
        return collect($book_id);

//        return $model->where('category_id', '=', 2)->whereIn('isbn', $book_id)->sortByDesc('discount')->sortByDesc('recommend')->unique('name');
    }

    public function filterByCategory ($model, $category)
    {
        if (is_numeric($category)){
            return $model->where('category_id', $category);
        }
        else{
            $book_id = DB::table('books')
                ->select('*')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                ->where('genres.name', 'like', '%' . $category . '%')->pluck('isbn');

            return $model->whereIn('isbn', $book_id);

        }

    }

    public function categoryGeneral($model, $category_general){
        return $model->where('category_id', $category_general);
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

//    public function stock_delete(Request $request)
//    {
//        $book_id = DB::table('books')
//            ->where('book_id', '=', $request->id)
//            ->pluck('book_id');
//        DB::table('books')
//            ->whereIn('id', '=', $book_id)
//            ->update(['discount' => null]);
//        DB::table('book_stock')->where('book_id', '=', $request->id)->delete();
//
//        return view ('stocks.create',['stock' => $request->id]);
//
//    }

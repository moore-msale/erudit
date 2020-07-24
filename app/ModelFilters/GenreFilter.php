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

class GenreFilter extends Collection
{
    public function filterGenreCollection(Request $request)
    {
        $model = $this;
        if($stationery = $request->stationery) {
            $model = $this->filterByStationery($model, $stationery);
        }

        return $model;
    }

    public function filterByStationery($model, $stationery)
    {
//        dd('stationary');
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
}




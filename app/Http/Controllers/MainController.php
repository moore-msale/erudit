<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $result = collect(['Книги' => Book::where('name', 'like', "%$search%")->where('type', 'book')->get()]);
        $result = $result->merge(collect(['Игры' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Товары для творчества' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Канцелярские товары' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'stuff')->get()]));
        $result = $result->merge(collect(['Учебные материалы' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'school')->get()]));
        if ($request->ajax()) {
            return response()->json(view('_partials.search-result-ajax', [
                'result' => $result,
            ])->render());
        }
        return view('_partials.search-result', [
            'result' => $result,
        ]);
    }
}

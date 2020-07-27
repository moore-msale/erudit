<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;
//namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        if ($request->ajax()) {
            $result = collect(['Книги' => Book::where('name', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%")
                ->orWhere('publishing', 'like', "%$search%")
                ->orWhere('isbn', 'like', "%$search%")
                ->where('type', 'book')->take(10)->get()]);
        }
        else {
            $result = collect(['Книги' => Book::where('name', 'like', "%$search%")
                ->orWhere('author', 'like', "%$search%")
                ->orWhere('publishing', 'like', "%$search%")
                ->orWhere('isbn', 'like', "%$search%")
                ->where('type', 'book')->get()]);
        }


        $result = $result->merge(collect(['Игры' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Товары для творчества' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Канцелярские товары' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'stuff')->get()]));
        $result = $result->merge(collect(['Учебные материалы' => Book::where('name', 'like', '%' . $search. '%')->where('type', 'school')->get()]));
        if ($request->ajax()) {
            return response()->json([
                'html' => view('_partials.search-result-ajax', [
                    'result' => $result,
                    'count' => count($result->collapse()),
                ])->render(),
            ]);
        }
        return view('_partials.search-result', [
            'result' => $result,
            'search_input' => $search,
        ]);
    }





    public function search_author(Request $request)
    {
        $search = $request->search;
        $result = collect(['Книги' => Book::where('author', 'like', "%$search%")->where('type', 'book')->get()]);


        $result = $result->merge(collect(['Игры' => Book::where('author', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Товары для творчества' => Book::where('author', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Канцелярские товары' => Book::where('author', 'like', '%' . $search. '%')->where('type', 'stuff')->get()]));
        $result = $result->merge(collect(['Учебные материалы' => Book::where('author', 'like', '%' . $search. '%')->where('type', 'school')->get()]));

        return view('_partials.search-result_author', [
            'result' => $result,
            'search_input' => $search,
        ]);
    }
        public function search_publisher(Request $request)
    {
        $search = $request->search;
        $result = collect(['Книги' => Book::where('publishing', 'like', "%$search%")->where('type', 'book')->get()]);


        $result = $result->merge(collect(['Игры' => Book::where('publishing', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Товары для творчества' => Book::where('publishing', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Канцелярские товары' => Book::where('publishing', 'like', '%' . $search. '%')->where('type', 'stuff')->get()]));
        $result = $result->merge(collect(['Учебные материалы' => Book::where('publishing', 'like', '%' . $search. '%')->where('type', 'school')->get()]));

        return view('_partials.search-result_publisher', [
            'result' => $result,
            'search_input' => $search,
        ]);
    }
        public function search_series(Request $request)
    {
        $search = $request->search;
        $result = collect(['Книги' => Book::where('series', 'like', "%$search%")->where('type', 'book')->get()]);


        $result = $result->merge(collect(['Игры' => Book::where('series', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Товары для творчества' => Book::where('series', 'like', '%' . $search. '%')->where('type', 'game')->get()]));
        $result = $result->merge(collect(['Канцелярские товары' => Book::where('series', 'like', '%' . $search. '%')->where('type', 'stuff')->get()]));
        $result = $result->merge(collect(['Учебные материалы' => Book::where('series', 'like', '%' . $search. '%')->where('type', 'school')->get()]));

        return view('_partials.search-result_series', [
            'result' => $result,
            'search_input' => $search,
        ]);
    }

        public function search_genre(Request $request)
    {
        $search = $request->search;
        // dd($search);
        // dd(Genre::find(83));
        $result = collect(['Книги' => DB::table('books')
            ->select('*')
            ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
            ->where('book_genre.genre_id', '=', $search)
            ->where('type', 'book')
            ->get()]);
        $result = $result->merge(collect(['Игры' => Book::all()->where('genre_id',$search)->where('type', 'game')]));
        $result = $result->merge(collect(['Товары для творчества' => Book::all()->where('genre_id',$search)->where('type', 'game')]));
        $result = $result->merge(collect(['Канцелярские товары' => Book::all()->where('genre_id',$search)->where('type', 'stuff')]));
        $result = $result->merge(collect(['Учебные материалы' => Book::all()->where('genre_id',$search)->where('type', 'school')]));


        return view('_partials.search-result_genre', [
            'result' => $result,
            'search_input' => Genre::find($search)->name,
        ]);
    }

//$joined_table = DB::table('tickets')->where('event_id',$id)->whereIn('type',['buy','done'])->select(
//    'tickets.id as ticket_id',
//    'tickets.type',
//    'tickets.ticket_price',
//    'tickets.event_id',
//    'users.name',
//    'users.last_name',
//    'users.middle_name',
//    'users.id'
//    )->join(
//    'users',
//    'users.id','=','tickets.user_id')->get();



}

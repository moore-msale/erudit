<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookStock;
use App\GeneralGenre;
use App\Stock;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function all_delete()
    {
        $books = Book::all();
        foreach ($books as $book)
        {
            $book->discount = null;
            $book->save();
        }
        return redirect()->route('user.index');
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        if(isset($request->id))
        {
            $stock = Stock::find($request->id);;
        }
        else
        {
            $stock = new Stock();
        }
        $stock->name = $request->desc;
        $stock->date = $request->date;
        $stock->discount = $request->discount;

        if ($file = $request->file('image')) {
            $name = mb_strtolower("stocks/" . 'stockstype'. rand(1,1400) . '.png');
            if ($file->move('stocks', $name)) {
                $stock->image = $name; //remane img_path
                $stock->save();
            }
        }
        $stock->save();
        if ($request->type == 2)
        {
                $stock->type = $request->type;
                $stock->category = $request->category;


            $items = $request->items;
            $books = Book::find($items);

//            if($stock->books)
//            {
//                foreach ($stock->books as $book) {
//                    $book->discount = null;
//                    $book->save();
//                }
//            }

            if($request->items){
                if ($bookssync = $request->items) {
                    if(isset($request->id)){
//                        dd('dfsdfsdf', $request->id);
                        foreach ($bookssync as $id){
                            $new_stock = new BookStock();
                            $new_stock->stock_id = $request->id;
                            $new_stock->book_id = $id;
                            $new_stock->save();
                        }
                    }
                    else{
                        $stock->books()->sync($bookssync);
                    }

                }
                foreach ($books as $book)
                {
                    $book->discount = $stock->discount;
                    $book->save();
                }
            }

            elseif ($request->category)
            {
                $book_id = DB::table('books')
                    ->select('*')
                    ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                    ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                    ->where('general_id', '=', $request->category)->pluck('isbn');

                $books = Book::whereIn('isbn', $book_id)->get();

                if(isset($request->id)){
                    foreach ($books as $id){
                        $new_stock = new BookStock();
                        $new_stock->stock_id = $request->id;
                        $new_stock->book_id = $id->id;
                        $new_stock->save();
                    }
                }
                else{
                    $stock->books()->sync($books);
                }

                foreach ($books as $book)
                {
                    $book->discount = $stock->discount;
                    $book->save();
                }
            }


        }elseif ($request->type == 1){
            $stock->type = $request->type;
            $stock->category = $request->category;

            $items = $request->items;
            $books = Book::find($items);

//            if($stock->books)
//            {
//                foreach ($stock->books as $book) {
//                    $book->discount = null;
//                    $book->save();
//                }
//            }
            if($request->items){
                if ($bookssync = $request->items) {
                    if(isset($request->id)){
                        foreach ($bookssync as $id){
                            $new_stock = new BookStock();
                            $new_stock->stock_id = $request->id;
                            $new_stock->book_id = $id;
                            $new_stock->save();
                        }
                    }
                    else{
                        $stock->books()->sync($bookssync);
                    }
                }
                foreach ($books as $book)
                {
                    $book->discount = $stock->discount;
                    $book->save();
                }
            }

            elseif ($request->category)
            {
                $book_id = DB::table('books')
                    ->select('*')
                    ->where('category_id', '=', 1)
                    ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                    ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                    ->where('genres.name', 'like', '%'.$request->category.'%')->pluck('isbn');

                $books = Book::whereIn('isbn', $book_id)->get();

                if(isset($request->id)){
                    foreach ($books as $id){
                        $new_stock = new BookStock();
                        $new_stock->stock_id = $request->id;
                        $new_stock->book_id = $id->id;
                        $new_stock->save();
                    }
                }
                else {
                    $stock->books()->sync($books);
                }

                    foreach ($books as $book)
                {
                    $book->discount = $stock->discount;
                    $book->save();
                }
            }
//            $stock->save();
        }
        elseif ($request->type == 3){
            $stock->type = $request->type;
            $stock->category = $request->category;

            $items = $request->items;
            $books = Book::find($items);

            if($request->items){
                if ($bookssync = $request->items) {
                    if(isset($request->id)){
                        foreach ($bookssync as $id){
                            $new_stock = new BookStock();
                            $new_stock->stock_id = $request->id;
                            $new_stock->book_id = $id;
                            $new_stock->save();
                        }
                    }
                    else{
                        $stock->books()->sync($bookssync);
                    }
                }
                foreach ($books as $book)
                {
                    $book->discount = $stock->discount;
                    $book->save();
                }
            }

            elseif ($request->category)
            {
                $id_num = (preg_replace('/[a-zA-Zа-яА-Я-]/', '', $request->category));
                $book_id = DB::table('books')
                    ->select('*')
                    ->where('category_id', '=', $id_num)
                    ->pluck('isbn');
                $books = Book::whereIn('isbn', $book_id)->get();

                if(isset($request->id)){
                    foreach ($books as $id){
                        $new_stock = new BookStock();
                        $new_stock->stock_id = $request->id;
                        $new_stock->book_id = $id->id;
                        $new_stock->save();
                    }
                }
                else {
                    $stock->books()->sync($books);
                }

                    foreach ($books as $book)
                {
                    $book->discount = $stock->discount;
                    $book->save();
                }
            }
        }
        elseif ($request->ula){
            $books = Book::all();
            foreach ($books as $book)
            {
                $book->discount = $stock->discount;
                $book->save();
            }
        }
        return redirect()->route('stock_edit', $stock->id);
    }

    public function edit($id)
    {
        $stock = Stock::find($id);

        return view ('stocks.create',['stock' => $stock]);
    }

    public function delete($id)
        {
        if ($id == 'delete_all'){
        $books = Book::all();
            foreach ($books as $book)
            {
                $book->discount = null;
                $book->save();
            }
            return redirect()->route('user.index');
        }
        $stock = Stock::find($id);
        $books = $stock->books;
        if(count($books)){
            foreach ($books as $book)
            {
                $book->discount = null;
                $book->save();
            }

            $stock->delete();
        }

        else{
            $books = Book::all();
            foreach ($books as $book)
            {
                $book->discount = null;
                $book->save();
            }

            $stock->delete();
        }


        return redirect()->route('user.index');
    }

    public function stock_delete(Request $request)
    {
        $book = Book::find($request->id);
        $book->discount = null;
        $book->save();
        DB::table('book_stock')->where('book_id', '=', $request->id)->delete();

    }

    public function stock_type(Request $request)
    {
        if($request->type == 2)
        {
            $genre = GeneralGenre::all();

        }elseif ($request->type == 1){
            $genre = 'stationery';
        }else{
            $genre = 'other';
        }

        return response()->json([
            'genre' => $genre,
        ]);
    }

    public function stock_category(Request $request)
    {
        if(is_numeric($request->category)){
            $book_id = DB::table('books')
                ->select('*')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                ->where('general_id', '=', $request->category)->pluck('isbn');

        }
        elseif ($request->category == 'all') {
            $book_id = Book::all()->where('category_id', '=', 1)->pluck('isbn');

        }elseif ($request->category == 'all_book'){
            $book_id = Book::all()->where('category_id','=', 2)->pluck('isbn');

        }elseif (stristr($request->category, 'other') == true){
            $id_num = (preg_replace('/[a-zA-Zа-яА-Я-]/', '', $request->category));
            $books = Book::where('category_id','=', $id_num)->get();
            $view = view('stocks.includes.books', ['books' => $books])->render();
            return response()->json([
                'view' => $view,
            ]);
        }
        else{
            $book_id = DB::table('books')
                ->select('*')
                ->join('book_genre', 'books.id', '=', 'book_genre.book_id')
                ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
                ->where('genres.name', 'like', '%' . $request->category . '%')->pluck('isbn');
        }


        $books = Book::whereIn('isbn', $book_id)->get();

        $view = view('stocks.includes.books', ['books' => $books])->render();

        return response()->json([
            'view' => $view,
        ]);
    }
}


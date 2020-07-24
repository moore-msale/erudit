<?php

namespace App\Http\Controllers;

use App\Book;
use App\Compilation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompilationController extends Controller
{
    public function create()
    {
        $compilation = Compilation::all()->first();

        return view('compilation.create',['compilation' => $compilation]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $compilation = Compilation::all()->first();
        $compilation->title = $request->title;
        $compilation->title_color = $request->color;
        if ($file = $request->file('image')) {
            $name = mb_strtolower("compilations/" . 'compilate'. rand(1,1400) . '.png');
            if ($file->move('stocks', $name)) {
                $compilation->image = $name; //remane img_path
                $compilation->save();
            }
        }
        $compilation->save();
        if (isset($request->items))
            {

                if ($bookssync = $request->items) {
                    $compilation->books()->sync($bookssync);
                }
                $books_id = $request->items;
                foreach ($books_id as $key=>$value){
//                    dd($value);
//                    $book_name = DB::table('books')->select('*')->where('id', 'like', $value);
                    $book_name = Book::where('id', '=', $value)->pluck('name');
//                    dd($book_name[0]);
                    DB::table('book_compilation')->where('book_id', '=', $value)->update(['name'=> $book_name[0]]);
                }
            }
            return redirect()->route('compilation_create');
//        $stock->name =
    }

    public function active()
    {
        $compilation = Compilation::all()->first();

        if($compilation->active == null)
        {
            $compilation->active = 1;
        }
        else
        {
            $compilation->active = null;
        }
        $compilation->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}

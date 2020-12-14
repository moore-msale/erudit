<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCompilation;
use App\Compilation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompilationController extends Controller
{
    public function create()
    {

        return view('compilation.create');
    }

    public function comp_delete(Request $request)
    {

        DB::table('book_compilation')
            ->where('compilation_id', '=', $request->conp_id)
            ->where ('book_id', '=', $request->book_id)
            ->delete();
    }
    public function delete($id)
    {
        $compilation = Compilation::find($id)->where('id', $id)->first();
        DB::table('book_compilation')->where('compilation_id', '=', $compilation->id)->delete();
        $compilation->delete();
        return redirect()->route('user.index');
    }
    public function update($id)
    {
        $compilation = Compilation::find($id);

        return view('compilation.create',['compilation' => $compilation]);
    }

    public function store(Request $request)
    {
//        dd($request->id);
        $compilation = Compilation::firstOrCreate(array('id' => $request->id));
        $compilation->title = $request->title;
        $compilation->title_color = $request->color;
        if ($file = $request->file('image')) {
            $name = mb_strtolower('compilate'. rand(1,1400) . '.png');

            if ($file->move('stocks', $name)) {
                $compilation->image = $name; //remane img_path
                $compilation->save();

            }
        }
//        dd($compilation);
        $compilation->save();
//        dd($compilation);
        if (isset($request->items))
            {
//                dd($request->items);
//
                if ($bookssync = $request->items) {
                    foreach ($bookssync as $key=>$value){
//                        $compilation->books()->insert($value);
                        DB::table('book_compilation')
                            ->insert(['book_id'=> $value, 'compilation_id'=>$compilation->id]);
                    }
//                    $compilation->books()->addselect($bookssync);
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
            return redirect()->route('compilation_update', $compilation->id);
//        $stock->name =
    }

    public function active(Request $request)
    {
        $compilation = Compilation::all()->where('id', $request->id)->first();

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

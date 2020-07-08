<?php

namespace App\Http\Controllers;

use App\Compilation;
use Illuminate\Http\Request;

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

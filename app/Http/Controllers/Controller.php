<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $bestsellers = Book::where('bestseller',1)->get();

        dd($bestsellers);
        return view('welcome');
    }
}

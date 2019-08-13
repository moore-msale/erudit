<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Cart;
use App\TokenResolve;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->token ? $request->token : uniqid();

        TokenResolve::resolve($token);

        CartFacade::session($token);

        return response()->json([
            'message' => 'Cart',
            'status' => 'success',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }

    public function add(Request $request)
    {
        $book = Book::find($request->book_id);
        $count = $request->count;
        $token = $request->token ? $request->token : uniqid();

        if (!$book) {
            return response()->json([
                'message' => 'book not found',
                'status' => 'error'
            ]);
        }
        TokenResolve::resolve($token);

        Cart::add($book, $count, $token);

        return response()->json([
            'status' => 'success',
            'message' => 'book added to cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }

    public function remove(Request $request)
    {
        $book = Book::find($request->book_id);
        $count = $request->count;
        $token = $request->token;

        if (!$book) {
            return response()->json([
                'message' => 'book not found',
                'status' => 'error'
            ]);
        }
        TokenResolve::resolve($token);

        Cart::remove($book, $count, $token);

        return response()->json([
            'status' => 'success',
            'message' => 'book updated in cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }

    public function delete(Request $request)
    {
        $book = Book::find($request->book_id);
        $token = $request->token;

        if (!$book) {
            return response()->json([
                'message' => 'book not found',
                'status' => 'error'
            ]);
        }
        TokenResolve::resolve($token);

        Cart::delete($book, $token);

        return response()->json([
            'status' => 'success',
            'message' => 'book added to cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }
}

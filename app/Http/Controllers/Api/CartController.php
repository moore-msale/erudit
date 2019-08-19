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
        $cart = CartFacade::session($token);

        Session::put('cart', $cart->getContent());

        return response()->json([
            'message' => 'Cart',
            'status' => 'success',
            'cart' => $cart->getContent(),
            'token' => $token,
            'html' => view('_partials.cart', [
                'cartItems' => $cart->getContent(),
                'total' => $cart->getTotal(),
            ])->render(),
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
        Session::put('cart', CartFacade::session($token)->getContent());

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

        if (!Cart::remove($book, $count, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found in cart',
                'cart' => CartFacade::session($token)->getContent(),
                'token' => $token,
            ]);
        }
        Session::put('cart', CartFacade::session($token)->getContent());

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

        if (!Cart::delete($book, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found in cart',
                'cart' => CartFacade::session($token)->getContent(),
                'token' => $token,
            ]);
        }
        Session::put('cart', CartFacade::session($token)->getContent());

        return response()->json([
            'status' => 'success',
            'message' => 'book added to cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }
}

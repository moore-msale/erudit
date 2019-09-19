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
    public function checkout(Request $request)
    {
        $token = $request->token ? $request->token : uniqid();
        $continue = $request->continue;
        TokenResolve::resolve($token);
        $cart = CartFacade::session($token);

        Session::put('cart', $cart->getContent());
        Session::flash('cart_checkout', true);
        if ($continue) {
            Session::flash('continue', true);

            return view('cart.checkout', [
                'cartItems' => $cart->getContent(),
                'total' => $cart->getTotal(),
            ]);
        }

        return view('cart.checkout', [
            'cartItems' => $cart->getContent(),
            'total' => $cart->getTotal(),
        ]);
    }

    public function store(Request $request)
    {
        $token = $request->token ? $request->token : Session::has('token') ? Session::get('token') : uniqid();

        TokenResolve::resolve($token);
        $cart = CartFacade::session($token);

        $newCart = new Cart();
        $newCart->cart = [
            'cart' => $cart->getContent(),
            'total' => $cart->getTotal(),
        ];
        $newCart->user_id = auth()->check() ? auth()->user()->id : null;
        $newCart->comment = $request->comment;
        $newCart->name = $request->name;
        $newCart->email = $request->email;
        $newCart->phone = $request->phone;
        $newCart->address = $request->address;
        $newCart->total = $request->total;
        if ($request->delivery == 'on') {
            $newCart->delivery = true;
            $newCart->sum = $request->sum;
            $newCart->diff = $request->diff;
        }
        $newCart->save();

        Session::forget(['cart', 'token']);
        Session::flash('cart_success', 'Your info has successfully created!');

        return redirect('/');
    }

    public function index(Request $request)
    {
        $token = $request->token ? $request->token : uniqid();

        $token = TokenResolve::resolve($token);
        $cart = CartFacade::session($token);

        Session::put('cart', $cart->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

        return response()->json([
            'message' => 'Cart',
            'status' => 'success',
            'cart' => $cart->getContent()->sortKeys(),
            'token' => $token,
            'total' => $cart->getTotalQuantity(),
            'html' => view('_partials.cart', [
                'cartItems' => $cart->getContent()->sortKeys(),
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
        $token = TokenResolve::resolve($token);

        Cart::add($book, $count, $token);
        Session::put('cart', CartFacade::session($token)->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

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
        $token = TokenResolve::resolve($token);

        if (!Cart::remove($book, $count, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found in cart',
                'cart' => CartFacade::session($token)->getContent(),
                'token' => $token,
            ]);
        }
        Session::put('cart', CartFacade::session($token)->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

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
        $token = TokenResolve::resolve($token);

        if (!Cart::deleteBook($book, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found in cart',
                'cart' => CartFacade::session($token)->getContent(),
                'token' => $token,
            ]);
        }
        Session::put('cart', CartFacade::session($token)->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'book added to cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }
}

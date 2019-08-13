<?php


namespace App;


use Darryldecode\Cart\Facades\CartFacade;

class Cart
{
    public static function add(Book $book, $count = 1, $token)
    {
        if (CartFacade::session($token)->get($book->id)) {
            return CartFacade::session($token)->update($book->id, [
                'quantity' => $count
            ]);
        } else {
            return CartFacade::session($token)->add($book->id, $book->name, auth()->check() ? $book->price_wholesale : $book->price_retail, $count ? $count : 1);
        }
    }

    public static function remove(Book $book, $count, $token)
    {
        if (CartFacade::session($token)->get($book->id)->getQuantity() == $count) {
            return CartFacade::session($token)->remove($book->id);
        } else {
            return CartFacade::session($token)->update($book->id, [
                'quantity' => -$count,
            ]);
        }
    }

    public static function delete(Book $book, $token)
    {
        return CartFacade::session($token)->remove($book->id);
    }
}
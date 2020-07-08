<?php


namespace App;


use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $casts = [
        'cart' => 'collection',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function add(Book $book, $count = 1, $token)
    {
        if (CartFacade::session($token)->get($book->id)) {
            return CartFacade::session($token)->update($book->id, [
                'quantity' => $count
            ]);
        } else {
            return CartFacade::session($token)->add($book->id, $book->name, auth()->check() ? intval(isset($book->price_retail) ? (isset($book->discount) ? $book->price_retail - ($book->price_retail / 100 * $book->discount) : $book->price_retail) : (isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale)) :(isset($book->discount) ? $book->price_wholesale - ($book->price_wholesale / 100 * $book->discount) : $book->price_wholesale) , $count ? $count : 1);
        }
    }

    public static function remove(Book $book, $count, $token)
    {
        if (!CartFacade::session($token)->get($book->id)) {
            return null;
        }

        if (CartFacade::session($token)->get($book->id)->quantity == $count) {
            return CartFacade::session($token)->remove($book->id);
        } else {
            return CartFacade::session($token)->update($book->id, [
                'quantity' => -$count,
            ]);
        }
    }

    public static function deleteBook(Book $book, $token)
    {
        if (!CartFacade::session($token)->get($book->id)) {
            return null;
        }

        return CartFacade::session($token)->remove($book->id);
    }
}

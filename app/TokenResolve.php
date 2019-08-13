<?php


namespace App;


use Illuminate\Support\Facades\Session;

class TokenResolve
{
    public static function resolve($token)
    {
        if (Session::has('token')) {
            if (Session::get('token') != $token) {
                Session::forget('token');
                Session::put('token', $token);
            }
        } else {
            Session::put('token', $token);
        }
    }
}
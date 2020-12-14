<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('pages.profile',['user' => $user]);
    }




public function register_user(Request $request){
    $data=$request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    $user->role_id = 3;
    $user->save();
    Auth::loginUsingId($user->id);
	return Redirect::back();

	}
}

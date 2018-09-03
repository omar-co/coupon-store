<?php

namespace App\Http\Controllers;

use App\Cupones;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        $cupones = $user->cupones;
        $products = $user->products;
        return view('user.profile', compact('cupones', 'products'));
    }
}

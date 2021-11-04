<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (Auth::user() && Auth::user()->id) {
            $user = Auth::user();
            $items = $user->items;
            return view('dashboard', [
                'user' => $user,
                'items' => $items,
            ]);
        }

        return redirect('/home');
    }
}

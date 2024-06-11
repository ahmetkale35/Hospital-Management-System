<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function show()
    {
        // Giriş yapmış olan kullanıcının bilgilerini al
        $user = Auth::user();

        // Kullanıcının bilgilerini blade dosyasına aktar
        return view('user.profile', compact('user'));
    }
}

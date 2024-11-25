<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function saludo()
    {
        // Obtener datos de forma matricial (bidimensional)
        $user = User::all();
        //obtener datos de forma unidimensional
      //  $user = User::first();
        return view('saludo',compact('user'));
    }
}

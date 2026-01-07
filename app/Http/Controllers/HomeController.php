<?php

namespace App\Http\Controllers;

use App\Models\Talleres;
use App\Models\User;
use Illuminate\Http\Request;

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
        $dataTalleres = Talleres::where('estado','activo')->get(); 

      

        return view('home', compact('dataTalleres'));
    }
}

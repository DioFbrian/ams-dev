<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Email;
use App\Models\Holder;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laptop;

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
        $LaptopCount = Laptop::count();
        $EmailCount = Email::count();
        $CardCount = Card::count();
        $HolderCount = Holder::count();

        return view('home', ['LaptopCount' => $LaptopCount,'EmailCount' => $EmailCount, 'CardCount' => $CardCount, 'HolderCount' => $HolderCount ]);
    }

}

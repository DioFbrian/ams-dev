<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Card;
use App\Models\Email;
class AssetController extends Controller
{
    public function manage_laptop()
    {
        $laptop = Laptop::all();

        return view('asset.manage_laptop', ['laptop' => $laptop]);
    }

    public function manage_card()
    {
        $card = Card::all();

        return view('asset.manage_card', ['card' => $card]);
    }

    public function manage_email()
    {
        $email = Email::all();

        return view('asset.manage_email', ['email' => $email ]);
    }
}

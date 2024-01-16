<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    public function add_card(Request $request)
    {
        $request->validate([
            'input_card_name' => 'required',
        ]);

        $lastcard = Card::orderBy('id', 'desc')->first();

        $lastId = $lastcard->id ?? 0; // Ambil nilai ID; jika $lastcard kosong, gunakan 0 sebagai default
        $nextNumber = $lastId + 1; // Menambah 1 ke ID terakhir

        // Membuat entri baru dalam tabel Medicals
        $card = new Card();
        $card->id = $nextNumber;
        $card->name_card = $request->input_card_name;
        $card->status = 0;
        $card->save();

        return redirect('/asset/card')->with('success', 'New Card Add successfully');
    }

    public function edit_card(Request $request, $id)
    {
        $request->validate([
            'edit_card_name' => 'required',
        ]);

        $card_id = Card::where('id', $id)->first();
        $cardID = $card_id->id;

        $card = Card::find($id);
        $card->name_card = $request->edit_card_name;
        $card->save();

        return redirect('/asset/card')->with('success', "You Edit Card ID $cardID Successfully");
    }

    public function delete_card(Request $request, $id)
    {
        $card_id = Card::where('id', $id)->first();
        $cardID = $card_id->id;

        $card = Card::findOrfail($id);
        $card->delete();

        return redirect('/asset/card')->with('success', "You Delete Card ID $cardID Successfully");
    }
}

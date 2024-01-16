<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailController extends Controller
{
    public function add_email(Request $request)
    {
        $request->validate([
            'input_email' => 'required',
            'input_name' => 'required'
        ]);

        $lastemail = Email::orderBy('id', 'desc')->first();

        $lastId = $lastemail->id ?? 0; // Ambil nilai ID; jika $lastemail kosong, gunakan 0 sebagai default
        $nextNumber = $lastId + 1; // Menambah 1 ke ID terakhir

        // // Membuat ID baru dengan format yang diinginkan (misal: L-PC038)
        // $nextId = 'E - ' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $email = new Email();
        $email->id = $nextNumber;
        $email->name = $request->input_name;
        $email->email = $request->input_email;
        // $email->email_num = $nextId;
        $email->status = 0;
        $email->save();

        return redirect('/asset/email')->with('success', 'New email Add successfully');
    }

    public function edit_email(Request $request, $id)
    {
        $request->validate([
            'edit_email_name' => 'required',
        ]);

        $email_id = Email::where('id', $id)->first();
        $emailID = $email_id->email_num;

        $email = Email::find($id);
        $email->email = $request->edit_email_name;
        $email->save();

        return redirect('/asset/email')->with('success', "You Edit email ID $emailID Successfully");
    }

    public function delete_email(Request $request, $id)
    {
        $email_id = Email::where('id', $id)->first();
        $emailID = $email_id->email_num;

        $email = Email::findOrfail($id);
        $email->delete();

        return redirect('/asset/email')->with('success', "You Delete email ID $emailID Successfully");
    }
}

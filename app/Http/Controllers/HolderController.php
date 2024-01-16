<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Card;
use App\Models\Email;
use App\Models\Holder;
use App\Models\User;
use App\Models\Department;
use App\Models\Position;

class HolderController extends Controller
{
    public function manage_holder()
    {
        $holder = Holder::all();
        $user = User::all();
        $laptop = Laptop::where('status', '0')->get();
        return view('holder.manage_holder', ['holder' => $holder, 'user' => $user, 'laptop' => $laptop]);
    }

    public function add_holder(Request $request)
    {
        $request->validate([
            'input_user_id' => 'required',
            'input_laptop' => 'required',
            'input_date_granted' => 'required',
            'input_notes' => 'sometimes'
        ]);

        $lastholder = Holder::orderBy('id', 'desc')->first();

        $lastId = $lastholder->id ?? 0; // Ambil nilai ID; jika $lastemail kosong, gunakan 0 sebagai default
        $nextNumber = $lastId + 1; // Menambah 1 ke ID terakhir

        // // Membuat ID baru dengan format yang diinginkan (misal: L-PC038)
        // $nextId = 'E - ' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $email = User::where('id', $request->input_user_id )->first();
        $laptop_id = $request->input_laptop;

        $holder = new Holder();
        $holder->id = $nextNumber;
        $holder->user_id = $request->input_user_id;
        $holder->email = $email->email;
        $holder->assets_id = $laptop_id;
        $holder->date_granted = $request->input_date_granted;
        $holder->note = $request->input_notes;
        $holder->save();

        $laptop = Laptop::where('id', $laptop_id)->first();
        $laptop->status = 1;
        $laptop->save();

        return redirect('/manage/holder')->with('success', 'New Holder Add Successfully');
    }

    public function view_holder($id)
    {

        $holder = Holder::findorFail($id);
        $user_id = $holder->user_id;
// dd($holder);
        $department = Department::all();
        $position = Position::all();

        $user = User::where('id', $user_id)->first();
        return view('holder.view_holder', ['holder' => $holder, 'user' => $user, 'dep_data' => $department, 'pos_data' => $position ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Laptops_detail;

class LaptopController extends Controller
{
    public function add_laptop(Request $request)
    {
        $request->validate([
            'input_laptop_name' => 'required',
            'input_ownership_status' => 'required',
            'input_purchase_date' => 'required',
            'input_processor' => 'required',
            'input_ram' => 'required',
            'input_storage' => 'required',
        ]);

        // ID Medical
        $lastLaptop = Laptop::orderBy('id', 'desc')->first();

        $lastId = $lastLaptop->id; // Ambil nilai ID
        $nextNumber = max($lastId + 1, 38); // Pastikan tidak kurang dari 38

        $lastNum = $lastLaptop->laptops_num; // Ambil nilai ID
        $nextNum = max($lastNum + 1, 38); // Pastikan tidak kurang dari 38

        // Membuat entri baru dalam tabel Medicals
        $laptop = new Laptop();
        $laptop->id = $nextNumber;
        $laptop->laptop_name = $request->input_laptop_name;
        $laptop->laptops_num = $nextNum;
        $laptop->ownership_status = $request->input_ownership_status;
        $laptop->status = 0;
        $laptop->purchase_date = $request->input_purchase_date;
        $laptop->save();

        $laptop_detail = new Laptops_detail();
        $laptop_detail->processor = $request->input_processor;
        $laptop_detail->ram = $request->input_ram;
        $laptop_detail->storage = $request->input_storage;
        $laptop_detail->laptop_id = $nextNumber;
        $laptop_detail->save();
        
        return redirect('/asset/laptop')->with('success', 'New Laptop Add successfully');
    }

    public function edit_laptop (Request $request, $id)
    {
        $request->validate([
            'edit_laptop_name' => 'sometimes',
            'edit_ownership_status' => 'sometimes',
            'edit_purchase_date' => 'sometimes',
            'edit_processor' => 'sometimes',
            'edit_ram' => 'sometimes',
            'edit_storage' => 'sometimes',
        ]);

        $laptop_id = Laptop::where('id', $id)->first();
        $lapID = $laptop_id->laptops_num;

        $laptop = Laptop::find($id);
        $laptop->laptop_name = $request->edit_laptop_name;
        $laptop->ownership_status = $request->edit_ownership_status;
        $laptop->purchase_date = $request->edit_purchase_date;
        $laptop->save();

        $laptop_detail = Laptops_detail::where('laptop_id', $id)->first();
        $laptop_detail->processor = $request->edit_processor;
        $laptop_detail->ram = $request->edit_ram;
        $laptop_detail->storage = $request->edit_storage;
        $laptop_detail->save();

        return redirect('/asset/laptop')->with('success', "You've Edit Laptop L - PC0$lapID Successfully");
    }

    public function delete_laptop (Request $request, $id)
    {
        $laptop_id = Laptop::where('id', $id)->first();
        $lapID = $laptop_id->laptops_num;

        $laptop = Laptop::findOrfail($id);
        $laptop->delete();

        $laptop_detail = Laptops_detail::where('laptop_id', $id)->first();
        $laptop_detail->delete();

        return redirect('/asset/laptop')->with('success', "You've Delete Laptop L - PC0$lapID Successfully");
    }
}

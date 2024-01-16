<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptops_detail extends Model
{
    protected $table = "laptops_details";
    protected $fillable = ["id", "processor", "ram", "storage", "laptop_id", "created_at", "updated_at"];

    public function laptops_detail()
    {
        return $this->belongsTo('App\Models\Laptop');
    }
}

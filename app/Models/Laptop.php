<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $table = "laptops";
    // protected $primaryKey = 'laptops_num';
    protected $fillable = ["id", "laptop_name", "purchase_date", "laptops_num", "ownership_status" ,"created_at", "updated_at"];

    public function holder()
    {
        return $this->hasOne('App\Models\Holder', 'assets_id', 'laptops_num')->withDefault();
    }

    public function laptops_detail()
    {
        return $this->hasOne('App\Models\laptops_detail');
    }
}

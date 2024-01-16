<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = "Emails";
    protected $fillable = ["id", "name", "email", "status", "created_at", "updated_at"];

    public function holder()
    {
        return $this->hasOne('App\Models\Holders');
    }

    // public function laptops_detail()
    // {
    //     return $this->hasOne('App\Models\laptops_detail');
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
    protected $table = "holders";
    // protected $primaryKey = 'assets_id';
    protected $fillable = ["id", "user_id","email","date_granted","note","assets_id", "created_at", "updated_at"];

    public function laptop()
    {
        return $this->belongsTo('App\Models\Laptop', 'assets_id', 'laptops_num')->withDefault();
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->withDefault();
    }
}

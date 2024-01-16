<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $connection = 'ess';
    protected $table = "department";
    protected $fillable = ["id", "department_name","created_at", "updated_at"];

    public function user()
    {
        return $this->hasOne('App\Models\Users');
    }

}
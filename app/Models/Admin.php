<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = array('nama','username','password','repassword','is_delete');

    public function keluhans()
    {
        return $this->hasMany(Keluhan::class);
    }
}

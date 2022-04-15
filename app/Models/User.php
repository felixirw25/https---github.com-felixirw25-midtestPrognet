<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = array('pengenal', 'nomor_pengenal', 'nama', 'alamat', 'telepon', 'email', 'password','repassword');

    public function keluhans()
    {
        return $this->hasMany(Keluhan::class);
    }
}

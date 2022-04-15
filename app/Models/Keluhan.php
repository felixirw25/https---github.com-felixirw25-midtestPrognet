<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $fillable = array('judul_keluhan', 'keluhan_user','waktu_keluhan','balasan_admin','user_id','waktu_balasan','is_delete');

    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

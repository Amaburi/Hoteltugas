<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class getuserId extends Model
{
    protected $table = 'getuser_id';
    protected $primarykey = 'id';
    protected $fillable = ['name','user_id'];
}

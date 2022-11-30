<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorites';
    protected $primarykey = 'id';
    protected $fillable = ['hotel_id','user_id','nama','note'];
}

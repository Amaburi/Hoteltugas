<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotellist extends Model
{
    protected $table = 'hotellist';
    protected $primarykey = 'id';
    protected $fillable = ['hotel','uniqueid','location','rating'];
}

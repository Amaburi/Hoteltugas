<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotellist extends Model
{
    protected $table = 'hotellists';
    protected $primarykey = 'hotelid';
    protected $fillable = ['hotel','hotelid','location','rating'];
}

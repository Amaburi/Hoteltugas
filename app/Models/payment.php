<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = 'payments';
    protected $primarykey = 'id';
    protected $fillable = ['hotelid','kamar','days','PaymentMethod'];
}

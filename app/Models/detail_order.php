<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_order extends Model
{
    use HasFactory;
    protected $table='detail_order';
    protected $fillable=['order_id','coffee_id','quantity','price','create_at','update_at'];
  

}

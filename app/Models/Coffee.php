<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;
    protected $table='coffee';
    protected $fillable=['name','size','price','image','create_at','update_at'];
}

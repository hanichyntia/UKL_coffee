<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderList extends Model
{
    use HasFactory;
    protected $table='order_list';
    protected $fillable=['customer_name','order_type','order_date','create_at','update_at'];
    public function detailorder()
    {
        return $this->belongsTo(detail_order::class,'order_id');
    }

}

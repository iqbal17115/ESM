<?php

namespace App\Models\FrontEnd;

use App\Models\Backend\Product\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}

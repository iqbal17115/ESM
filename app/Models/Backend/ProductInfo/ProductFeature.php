<?php

namespace App\Models\Backend\ProductInfo;

use App\Models\Backend\ProductInfo\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;
    public function Product(){
        return $this->hasMany(Product::class)->whereIsActive(1);
    }
}

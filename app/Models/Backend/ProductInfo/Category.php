<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function CountProduct(){
        return $this->hasMany(Product::class);
    }
    public function SubCategory(){
        return $this->hasMany(SubCategory::class);
    }
    public function CategoryCheck(){
        return $this->hasOne(Product::class);
    }
    public function Product(){
        return $this->hasMany(Product::class)->whereIsActive(1)->take(4);
    }
}

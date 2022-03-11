<?php

namespace App\Models\Backend\Product;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function ProductImageTop4()
    {
        return $this->hasMany(ProductImage::class)->where('is_default','!=', 1);
    }
    public function ProductImageFirst()
    {
        return $this->hasOne(ProductImage::class)->whereIsDefault(1);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function SubSubCategory()
    {
        return $this->belongsTo(SubSubCategory::class);
    }
}

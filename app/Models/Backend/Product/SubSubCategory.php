<?php

namespace App\Models\Backend\Product;

use App\Models\Backend\Product\SubCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function SubCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}

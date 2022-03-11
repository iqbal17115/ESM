<?php

namespace App\Models\Backend\Product;

use App\Models\Backend\Product\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}

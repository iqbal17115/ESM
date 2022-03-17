<?php

namespace App\Models\FrontEnd;

use App\Models\Backend\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCard extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    use HasFactory;

    public function getProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

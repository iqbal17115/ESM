<?php

namespace App\Models\FrontEnd;

use App\Models\Backend\ProductInfo\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddToCard extends Model
{
    use HasFactory;

    public function getProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

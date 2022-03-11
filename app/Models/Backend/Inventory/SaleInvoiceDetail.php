<?php

namespace App\Models\Backend\Inventory;

use App\Models\Backend\Product\Product;
use App\Models\Backend\Invventory\SaleInvoice;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function SaleInvoice(){
        return $this->belongsTo(SaleInvoice::class);
    }
}

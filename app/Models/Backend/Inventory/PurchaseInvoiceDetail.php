<?php

namespace App\Models\Backend\Inventory;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}

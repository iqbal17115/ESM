<?php

namespace App\Models\Backend\Inventory;

use App\Models\Backend\Contact\Contact;
use App\Models\Backend\Inventory\PurchaseInvoiceDetail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function Contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function PurchaseInvoiceDetail()
    {
        return $this->hasMany(purchaseInvoiceDetail::class);
    }

    public function PurchasePayment()
    {
        return $this->hasMany(PurchasePayment::class);
    }

}

<?php

namespace App\Models\Backend\Inventory;

use App\Models\Backend\Contact\Contact;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\Inventory\SalePayment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function Contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function SaleInvoiceDetail()
    {
        return $this->hasMany(SaleInvoiceDetail::class);
    }

    public function SalePayment()
    {
        return $this->hasMany(SalePayment::class);
    }

}

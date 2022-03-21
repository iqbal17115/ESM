<?php

namespace App\Http\Livewire\Backend\Transaction;
use App\Models\Backend\Transaction\Payment;
use Livewire\Component;

class SupplierPaymentReport extends Component
{
    public function render()
    {
        return view('livewire.backend.transaction.supplier-payment-report',[
            'supplier_payments'=>Payment::whereType('SupplierPayment')->get(),
        ]);
    }
}

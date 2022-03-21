<?php

namespace App\Http\Livewire\Backend\Transaction;
use App\Models\Backend\Transaction\Payment;
use Livewire\Component;

class CustomerPaymentReport extends Component
{
    public function render()
    {
        return view('livewire.backend.transaction.customer-payment-report',[
           'customer_payments'=>Payment::whereType('CustomerPayment')->get(),
        ]);
    }
}

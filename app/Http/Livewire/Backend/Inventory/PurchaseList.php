<?php

namespace App\Http\Livewire\Backend\Inventory;
use App\Models\Backend\Inventory\PurchaseInvoice;
use App\Models\Backend\Inventory\purchaseInvoiceDetail;
use App\Models\Backend\Inventory\PurchasePayment;
use Livewire\Component;

class PurchaseList extends Component
{
    public $DeleteProductId;

    public function ConfirmDelete(){
        $this->PurchaseDelete($this->DeleteProductId);
        $this->reset(['DeleteProductId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteProductId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function PurchaseDelete($invoiceId){
        PurchaseInvoice::whereId($invoiceId)->delete();
        PurchaseInvoiceDetail::wherePurchaseInvoiceId($invoiceId)->delete();
        PurchasePayment::wherePurchaseInvoiceId($invoiceId)->delete();

        $this->emit('success', [
            'text' => 'Purchase Invoice Deleted Successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.inventory.purchase-list');
    }
}

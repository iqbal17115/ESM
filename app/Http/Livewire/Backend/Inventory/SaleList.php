<?php

namespace App\Http\Livewire\Backend\Inventory;

use App\Models\Backend\Inventory\SaleInvoice;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\Inventory\SalePayment;
use Livewire\Component;

class SaleList extends Component
{
    public $DeleteProductId;

    public function ConfirmDelete(){
            $SaleInvoice = SaleInvoice::whereId($this->DeleteProductId)->first();
            if($SaleInvoice->order_id){
               $Order = Order::find($SaleInvoice->order_id);
               $Order->status = 'cancelled';
               $Order->save();
            }
            SaleInvoice::whereId($this->DeleteProductId)->delete();
            SaleInvoiceDetail::whereSaleInvoiceId($this->DeleteProductId)->delete();
            SalePayment::whereSaleInvoiceId($this->DeleteProductId)->delete();
            $this->reset(['DeleteProductId']);
            $this->emit('modal', 'DeletePopup');
            $this->emit('success', [
                'text' => 'Sale Invoice Deleted Successfully',
            ]);
    }
    public function DeleteModal($id){
        $this->DeleteProductId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function SaleDelete($invoiceId){

        $this->emit('success', [
            'text' => 'Sale Invoice Deleted Successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.inventory.sale-list');
    }
}

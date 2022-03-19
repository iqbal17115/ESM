<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Backend\Setting\PaymentMethod as PaymentMethodInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PaymentMethod extends Component
{
    public $code;
    public $name;
    public $account_holder_name;
    public $account_no;
    public $opening_balance = 0;
    public $created_by;
    public $is_active = 1;
    public $paymentMethod_id;
    public $DeleteId;

    public function ConfirmDelete(){
        $this->paymentMethodDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function PaymentMethodSave()
    {
        $this->validate([
            'code'                   => 'required',
            'name'                   => 'required',
            'account_holder_name'    => 'required',
            'account_no'             => 'required',
            'is_active'             => 'required',
        ]);


        if ($this->paymentMethod_id) {
            $Query  = PaymentMethodInfo::find($this->paymentMethod_id);
        } else {
            $Query           = new PaymentMethodInfo();
            $Query->created_by  = Auth::user()->id;
        }

        $Query->code                   = $this->code;
        $Query->name                   = $this->name;
        $Query->account_holder_name    = $this->account_holder_name;
        $Query->account_no             = $this->account_no;
        $Query->opening_balance             = $this->opening_balance;
        $Query->is_active       = $this->is_active;
        $Query->created_by                = Auth::user()->id;
        $Query->branch_id              = 1;
        $Query->save();
        $this->reset();
        $this->PaymentMethodModal();
        $this->emit('success', [
            'text' => 'Payment Method Saved Successfully',
        ]);
    }

    public function paymentMethodEdit($id)
    {
        $QueryUpdate             = PaymentMethodInfo::find($id);
        $this->paymentMethod_id    = $QueryUpdate->id;
        $this->code                = $QueryUpdate->code;
        $this->name                = $QueryUpdate->name;
        $this->account_holder_name    = $QueryUpdate->account_holder_name;
        $this->account_no          = $QueryUpdate->account_no;
        $this->opening_balance     = $QueryUpdate->opening_balance;
        $this->is_active     = $QueryUpdate->is_active;
        $this->emit('modal', 'PaymentMethodModal');
    }

    public function paymentMethodDelete($id)
    {
        PaymentMethodInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Payment Method Deleted Successfully',
        ]);
    }

    public function PaymentMethodModal()
    {
        $this->reset();
        $this->code = 'P' . floor(time() - 99999);
        $this->emit('modal', 'PaymentMethodModal');
    }

    public function render()
    {
        return view('livewire.backend.setting.payment-method');
    }
}

<?php

namespace App\Http\Livewire\Backend\Contact;

use App\Models\Backend\Contact\Contact;
use App\Models\Backend\Contact\ContactCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Supplier extends Component
{
    public $code;
    public $type;
    public $first_name;
    public $last_name;
    public $address;
    public $shipping_address;
    public $phone;
    public $mobile = 0;
    public $email;
    public $due_date;
    public $birthday;
    public $opening_balance;
    public $contact_category_id;
    public $CustomerCategoryId;
    public $is_active = 1;
    public $DeleteId;

    public function ConfirmDelete()
    {
        $this->contactDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id)
    {
        $this->DeleteId = $id;
        $this->emit('modal', 'DeletePopup');
        //   dd($id);
    }
    public function ContactInfoSave()
    {
        $this->validate([
            // 'contact_category_id'                   => 'required',
            'first_name'                   => 'required',
            // 'last_name'                   => 'required',
            // 'address'                   => 'required',
            // 'shipping_address'                   => 'required',
            'mobile'                   => 'required',
            'is_active'                   => 'required',
        ]);
        // dd($this->contact_category_id);
        if ($this->CustomerCategoryId) {
            $Query = Contact::find($this->CustomerCategoryId);
        } else {
            $Query           = new Contact();
            $Query->created_by  = Auth::id();
        }
        $Query->type                  = "Supplier";
        $Query->first_name                  = $this->first_name;
        $Query->last_name                  = $this->last_name;
        $Query->address               = $this->address;
        $Query->shipping_address      = $this->shipping_address;
        $Query->phone                 = $this->phone;
        $Query->mobile                = $this->mobile;
        $Query->email                 = $this->email;
        $Query->due_date              = $this->due_date;
        $Query->birthday              = $this->birthday;
        $Query->opening_balance       = $this->opening_balance;
        $Query->contact_category_id       = $this->contact_category_id;
        $Query->is_active                = $this->is_active;
        $Query->branch_id             = 1;
        $Query->save();
        $this->reset();
        $this->ContactModal();
        $this->emit('success', [
            'text' => 'Supplier C/U Successfully',
        ]);
    }

    public function contactDelete($id)
    {
        Contact::find($id)->delete();

        $this->emit('success', [
            'text' => 'Supplier Deleted successfully',
        ]);
    }

    public function contactEdit($id)
    {
        $QueryUpdate         = Contact::find($id);
        $this->CustomerCategoryId  = $QueryUpdate->id;
        $this->type                = $QueryUpdate->type;
        $this->first_name                = $QueryUpdate->first_name;
        $this->last_name                = $QueryUpdate->last_name;
        $this->address             = $QueryUpdate->address;
        $this->shipping_address    = $QueryUpdate->shipping_address;
        $this->phone               = $QueryUpdate->phone;
        $this->mobile              = $QueryUpdate->mobile;
        $this->email               = $QueryUpdate->email;
        $this->due_date            = $QueryUpdate->due_date;
        $this->birthday            = $QueryUpdate->birthday;
        $this->opening_balance     = $QueryUpdate->opening_balance;
        $this->contact_category_id     = $QueryUpdate->contact_category_id;
        $this->is_active              = $QueryUpdate->is_active;
        $this->emit('modal', 'ContactModal');
    }


    public function ContactModal()
    {
        $this->reset();
        $this->code  = 'C' . floor(time() - 999999);
        $this->emit('modal', 'ContactModal');
    }


    public function render()
    {
        return view('livewire.backend.contact.supplier',[
            'supplierCategories' => ContactCategory::whereType('Supplier')->get(),
        ]);
    }
}

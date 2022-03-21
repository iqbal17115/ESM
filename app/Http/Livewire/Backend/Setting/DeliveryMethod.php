<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\DeliveryMethod as DeliveryMethodInfo;
use App\Models\Backend\Setting\Branch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeliveryMethod extends Component
{
    public $code;
    public $name;
    public $address;
    public $branch_id;
    public $is_active=1;
    public $description;
    public $DeliveryId=NULL;
    public $DeleteId;

    public function ConfirmDelete(){
        $this->deliveryMethodDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function deliveryMethodEdit($id)
    {
        $this->Query = DeliveryMethodInfo::find($id);
        $this->DeliveryId = $this->Query->id;
        $this->code = $this->Query->code;
        $this->name = $this->Query->name;
        $this->branch_id = $this->Query->branch_id;
        $this->is_active = $this->Query->is_active;
        $this->address = $this->Query->address;
        $this->description = $this->Query->description;
		$this->emit('modal', 'deliveryMethodInfoModal');
    }
    public function deliveryMethodDelete($id)
    {
        DeliveryMethodInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Delivery Method Deleted Successfully',
        ]);
    }
    public function deliveryMethodSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'branch_id' => 'required',
            'address' => 'required',
            'description' => 'required',
            'is_active' => 'required',
        ]);
        if ($this->DeliveryId) {
            $Query = DeliveryMethodInfo::find($this->DeliveryId);
        } else {
            $Query = new DeliveryMethodInfo();
            $Query->created_by=Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->branch_id = $this->branch_id;
        $Query->is_active = $this->is_active;
        $Query->address = $this->address;
        $Query->description = $this->description;
        $Query->save();

        $this->deliveryMethodModal();

        $this->emit('success', [
            'text' => 'Delivery Method C/U Successfully',
        ]);
    }
    public function deliveryMethodModal(){
        $this->reset();
        $this->code = 'D'.floor(time() - 999999999);
        $this->emit('modal','deliveryMethodInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.delivery-method',[
            'branches'=>Branch::get(),
        ]);
    }
}

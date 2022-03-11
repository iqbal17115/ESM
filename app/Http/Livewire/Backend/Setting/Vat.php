<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Backend\Setting\Vat as VatData;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Vat extends Component
{
    public $code;
    public $name;
    public $rate_percent;
    public $rate_fixed;
    public $is_active = 1;
    public $vat_id;
    public $DeleteId;

    public function ConfirmDelete(){
        $this->vatDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }

    public function VatInfoSave()
    {

        $this->validate([
            'code'            => 'required',
            'name'            => 'required',
            'rate_percent'    => 'required',
            'rate_fixed'      => 'required',
            'is_active'      => 'required',
        ]);

        if ($this->vat_id) {
            $Query  = VatData::find($this->vat_id);
        } else {
            $Query = new VatData();
            $Query->created_by = Auth::user()->id;
        }

        $Query->code              = $this->code;
        $Query->name              = $this->name;
        $Query->rate_percent      = $this->rate_percent;
        $Query->rate_fixed        = $this->rate_fixed;
        $Query->branch_id         = 1;
        $Query->is_active       = $this->is_active;
        $Query->save();
        $this->reset();
        $this->VatModal();
        $this->emit('success', [
            'text' => 'Vat C/U Successfully',
        ]);
    }


    public function vatEdit($id)
    {
        $QueryUpdate  = VatData::find($id);
        $this->vat_id       = $QueryUpdate->id;
        $this->code         = $QueryUpdate->code;
        $this->name         = $QueryUpdate->name;
        $this->rate_percent = $QueryUpdate->rate_percent;
        $this->rate_fixed   = $QueryUpdate->rate_fixed;
        $this->is_active       = $QueryUpdate->is_active;
        $this->emit('modal', 'VatModal');
    }

    public function vatDelete($id)
    {
        VatData::find($id)->delete();
        $this->emit('success', [
            'text' => 'Vat Deleted Successfully',
        ]);
    }


    public function VatModal()
    {
        $this->reset();
        $this->code = 'V' . floor(time() - 999999);
        $this->emit('modal', 'VatModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.vat');
    }
}

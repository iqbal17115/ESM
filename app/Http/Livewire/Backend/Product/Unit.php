<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Backend\Product\Unit as UnitData;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Unit extends Component
{
    public $code;
    public $name;
    public $rate;
    public $is_active = 1;
    public $UnitId;
    public $DeleteId;

    public function ConfirmDelete(){
        $this->unitDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function unitEdit($id)
    {
        $QueryUpdate = UnitData::find($id);
        $this->UnitId = $QueryUpdate->id;
        $this->code = $QueryUpdate->code;
        $this->name = $QueryUpdate->name;
        $this->rate = $QueryUpdate->rate;
        $this->is_active = $QueryUpdate->is_active;

        $this->emit('modal', 'productUnitInfoModal');
    }

    public function unitDelete($id)
    {
        UnitData::find($id)->delete();

        $this->emit('success', [
            'text' => 'Unit Deleted Successfully',
        ]);
    }

    public function saveUnit()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'rate' => 'required',
            'is_active' => 'required',
        ]);

        if ($this->UnitId) {
            $Query = UnitData::find($this->UnitId);
        } else {
            $Query = new UnitData();
            $Query->created_by = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->rate = $this->rate;
        $Query->is_active = $this->is_active;
        $Query->branch_id = 1;
        $Query->save();
        $this->reset();
        $this->productUnitInfoModal();
        $this->emit('success', [
            'text' => 'Unit C/U Successfully',
        ]);
    }

    public function productUnitInfoModal()
    {
        $this->reset();
        $this->code = 'C'.floor(time() - 999999999);
        $this->emit('modal', 'productUnitInfoModal');
    }

    public function render()
    {
        return view('livewire.backend.product.unit');
    }
}

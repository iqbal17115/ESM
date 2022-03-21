<?php

namespace App\Http\Livewire\Backend\Setting;
use App\models\Backend\Setting\Warehouse as WareHouseInfo;
use App\Models\Backend\Setting\Branch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Warehouse extends Component
{
    public $code;
    public $name;
    public $address;
    public $is_active=1;
    public $branch_id;
    public $WarehouseId;
    public $DeleteId;
    public $is_default=0;

    public function ConfirmDelete(){
        $this->warehouseDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function warehouseEdit($id)
    {
        $Query = WareHouseInfo::find($id);
        $this->WarehouseId = $Query->id;
        $this->code = $Query->code;
        $this->name = $Query->name;
        $this->address = $Query->address;
        $this->branch_id = $Query->branch_id;
        $this->is_active = $Query->is_active;
		$this->emit('modal', 'warehouseModal');
    }
    public function warehouseDelete($id)
    {
        WareHouseInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Warehouse Deleted Successfully',
        ]);
    }
    public function warehouseSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'address' => 'required',
            'branch_id' => 'required',
            'is_active' => 'required',
        ]);
        if ($this->WarehouseId) {
            $Query = WareHouseInfo::find($this->WarehouseId);
        } else {

            $Query = new WareHouseInfo();
            $Query->created_by=Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->address = $this->address;
        $Query->branch_id = $this->branch_id;
        $Query->is_active = $this->is_active;

        $Query->save();

        $Query1 = WareHouseInfo::whereIsDefault(1)->first();

        if(!$Query1){
            $Query1->is_default=1;
        }else{
            $Query1->is_default=$this->is_default;
        }
        $Query->save();
        $this->reset();
        $this->warehouseModal();

        $this->emit('success', [
            'text' => 'Warehouse C/U Successfully',
        ]);
    }
    public function warehouseModal(){
        $this->reset();
        $this->code = 'W'.floor(time() - 999999999);
        $this->emit('modal','warehouseModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.warehouse',[
            'branches'=>Branch::get(),
        ]);
    }
}

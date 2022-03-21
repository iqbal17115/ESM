<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Size as SizeInfo;
use Livewire\Component;

class Size extends Component
{
    public $code;
    public $name;
    public $SizeId;
    public function deleteSize($id){
        SizeInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Size Deleted Successfully',
        ]);
    }
    public function editSize($id){
       $QueryUpdate=SizeInfo::find($id);
       $this->SizeId=$QueryUpdate->id;
       $this->code=$QueryUpdate->code;
       $this->name=$QueryUpdate->name;
    }
    public function sizeSave(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        // Insert Or Update Color
        if($this->SizeId){
           $Query=SizeInfo::find($this->SizeId);
        }else{
            $Query=new SizeInfo();
        }

        $Query->code=$this->code;
        $Query->name=$this->name;
        $Query->save();
        $this->reset();
        $this->code = 'S'.floor(time() - 999999999);

        $this->emit('success', [
            'text' => 'Size C/U Successfully',
        ]);
    }
    public function mount(){
        $this->code = 'S'.floor(time() - 999999999);
    }
    public function render()
    {
        return view('livewire.backend.product-info.size',[
            'sizes'=>SizeInfo::get(),
        ]);
    }
}

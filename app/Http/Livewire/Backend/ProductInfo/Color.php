<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Color as ColorInfo;
use Livewire\Component;

class Color extends Component
{
    public $name;
    public $color_code;
    public $ColorId;
    public function deleteColor($id){
        ColorInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Color Deleted Successfully',
        ]);
    }
    public function editColor($id){
       $QueryUpdate=ColorInfo::find($id);
       $this->ColorId=$QueryUpdate->id;
       $this->name=$QueryUpdate->name;
       $this->color_code=$QueryUpdate->color_code;
    }
    public function colorSave(){
        $this->validate([
            'name' => 'required',
            'color_code' => 'required',
        ]);

        // Insert Or Update Color
        if($this->ColorId){
           $Query=ColorInfo::find($this->ColorId);
        }else{
            $Query=new ColorInfo();
        }

        $Query->name=$this->name;
        $Query->color_code=$this->color_code;
        $Query->save();
        $this->reset();

        $this->emit('success', [
            'text' => 'Color C/U Successfully',
        ]);
    }
    public function render()
    {
        return view('livewire.backend.product-info.color',[
            'colors'=>ColorInfo::get(),
        ]);
    }
}

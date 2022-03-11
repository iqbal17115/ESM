<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Backend\Product\Brand as BrandData;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Brand extends Component
{
    use WithFileUploads;

    public $code;
    public $name;
    public $image;
    public $description;
    public $is_active = 1;
    public $brand_id;
    public $QueryUpdate;
    public $DeleteId;

    public function ConfirmDelete(){
        $this->brandDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function brandInfoSave()
    {
        $this->validate([
           'name' => 'required',
        //    'image'  => 'required',
            // 'description' => 'required',
            'is_active' => 'required',
        ]);

        if ($this->brand_id) {
            $Query = BrandData::find($this->brand_id);
        } else {
            $Query = new BrandData();
            $Query->created_by = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        if ($this->image) {
            $path = $this->image->store('/public/photo');
            $Query->image = basename($path);
        }
        $Query->description = $this->description;
        $Query->branch_id = 1;
        $Query->is_active = $this->is_active;
        $Query->save();
        $this->reset();
        $this->BrandAInfoModal();
        $this->emit('success', [
          'text' => 'brand saved successfully',
       ]);
    }

    public function brandEdit($id)
    {
        $this->QueryUpdate = BrandData::find($id);
        $this->brand_id = $this->QueryUpdate->id;
        $this->code = $this->QueryUpdate->code;
        $this->name = $this->QueryUpdate->name;
        $this->description = $this->QueryUpdate->description;
        $this->is_active = $this->QueryUpdate->is_active;
        // $this->BrandAInfoModal();
        $this->emit('modal', 'BrandAInfoModal');
    }

    public function brandDelete($id)
    {
        BrandData::find($id)->delete();
        $this->emit('success', [
           'text' => 'Brand deleted successfully',
        ]);
    }

    public function BrandAInfoModal()
    {
        $this->reset();
        $this->code = 'C'.floor(time() - 999999);
        $this->emit('modal', 'BrandAInfoModal');
    }

    public function render()
    {
        return view('livewire.backend.product.brand');
    }
}

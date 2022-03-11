<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Backend\Setting\Slider as SliderInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Slider extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $position;
    public $is_active=1;
    public $SliderId;
    public $QueryUpdate;
    public $DeleteId;

    public function ConfirmDelete(){
        $this->sliderImageDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function sliderImageEdit($id)
    {
        $this->QueryUpdate = SliderInfo::find($id);
        $this->SliderId = $this->QueryUpdate->id;
        $this->title = $this->QueryUpdate->title;
        $this->position = $this->QueryUpdate->position;
        $this->is_active = $this->QueryUpdate->is_active;
		$this->emit('modal', 'sliderImage');
    }
    public function sliderImageDelete($id)
    {
        SliderInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Slider Image Deleted Successfully',
        ]);
    }
    public function validation($id=NULL){
       if(!$id){
        $this->validate([
            'image' => 'required',
            'is_active' => 'required',
        ]);
       }
    }
    public function sliderImageSave()
    {

        if ($this->SliderId) {
            $this->validation($this->SliderId);
            $Query = SliderInfo::find($this->SliderId);
        } else {
            $this->validation();
            $Query = new SliderInfo();
            $Query->created_by = Auth::user()->id;
        }
        $Query->title = $this->title;
        if($this->image){
            $path = $this->image->store('/public/photo');
            $Query->image = basename($path);
        }
        $Query->position = $this->position;
        $Query->branch_id = 1;
        $Query->is_active = $this->is_active;
        $Query->save();
        $this->reset();
        $this->sliderImageModal();

        $this->emit('success', [
            'text' => 'Slider Image C/U Successfully',
        ]);
    }

    public function sliderImageModal(){
        $this->reset();
        $this->emit('modal','sliderImage');
    }
    public function render()
    {
        return view('livewire.backend.setting.slider');
    }
}

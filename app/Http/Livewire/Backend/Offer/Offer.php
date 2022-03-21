<?php

namespace App\Http\Livewire\Backend\Offer;
use App\Models\Backend\Offer\Offer as OfferInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Offer extends Component
{
    use WithFileUploads;

    public $code;
    public $image;
    public $title;
    public $description;
    public $discount;
    public $discount_percent;
    public $link;
    public $is_active=1;
    public $OfferId;
    public $DeleteId;
    public $QueryUpdate;

    public function ConfirmDelete(){
        $this->OfferDelete($this->DeleteId);
        $this->reset(['DeleteId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function OfferEdit($id)
    {
        $this->QueryUpdate = OfferInfo::find($id);
        $this->OfferId = $this->QueryUpdate->id;
        $this->code = $this->QueryUpdate->code;
        $this->title = $this->QueryUpdate->title;
        $this->description = $this->QueryUpdate->description;
        $this->discount = $this->QueryUpdate->discount;
        $this->discount_percent = $this->QueryUpdate->discount_percent;
        $this->link = $this->QueryUpdate->link;
        $this->is_active = $this->QueryUpdate->is_active;
		$this->emit('modal', 'OfferModal');
    }
    public function OfferDelete($id)
    {
        OfferInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Offer Deleted Successfully',
        ]);
    }
    public function OfferSave()
    {
        $this->validate([
            'code' => 'required',
            'title' => 'required',
            'is_active' => 'required',
        ]);
        if ($this->OfferId) {
            $Query = OfferInfo::find($this->OfferId);
        } else {
            $Query = new OfferInfo();
            $Query->created_by = Auth::id();
        }
        $Query->code = $this->code;
        $Query->title = $this->title;
        $Query->description = $this->description;
        if ($this->image) {
            $path = $this->image->store('/public/photo');
            $Query->image = basename($path);
        }
        $Query->discount = $this->discount;
        $Query->discount_percent = $this->discount_percent;
        $Query->link = $this->link;
        $Query->is_active = $this->is_active;
        $Query->save();
        $this->reset();
        $this->OfferModal();
        $this->emit('success', [
            'text' => 'Offer C/U Successfully',
        ]);
    }

    public function OfferModal(){
        $this->reset();
        $this->code = 'OF'.floor(time() - 999999999);
        $this->emit('modal','OfferModal');
    }
    public function render()
    {
        return view('livewire.backend.offer.offer');
    }
}

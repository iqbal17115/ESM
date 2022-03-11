<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Backend\Product\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $ProductDetail;
    public $DeleteProductId;

    public function ConfirmDelete(){
        $this->deleteProduct($this->DeleteProductId);
        $this->reset(['DeleteProductId']);
        $this->emit('modal', 'DeletePopup');
    }
    public function DeleteModal($id){
        $this->DeleteProductId=$id;
        $this->emit('modal', 'DeletePopup');
    //   dd($id);
    }
    public function ProductDetails($id)
    {
        $this->ProductDetail = Product::find($id);
        $this->emit('modal', 'productDetailModal');

        // dd($this->ProductDetail);
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        ProductInfo::whereProductId($id)->delete();
        ProductImage::whereProductId($id)->delete();
        // ProductProperties::whereProductId($id)->delete();

        $this->emit('success', [
            'text' => 'Product Deleted Successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.product.product-list');
    }
}

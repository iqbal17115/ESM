<?php

namespace App\Http\Livewire\Backend\Order;

use App\Models\FrontEnd\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeliveredOrderList extends Component
{
    public $from_date = '00-00-00';
    public $to_date = '01-01-3000';
    public $search_order;

    public function mount(){
        // $this->from_date = Carbon::now()->format('Y-m-d');
        // $this->to_date = Carbon::now()->format('Y-m-d');
    }
    public function dateFilter($model)
    {
        return $model->where('order_date', '>=', Carbon::parse($this->from_date)->format('Y-m-d'))->where('order_date', '<=', Carbon::parse($this->to_date)->format('Y-m-d'));
    }

    public function render()
    {
        $order = Order::whereStatus('delivered')->orderBy('id', 'DESC');
        if ($this->search_order) {
            $order->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('contacts')
                    ->whereRaw('contacts.id = orders.contact_id')
                    // ->whereRaw('chart_of_accounts.name != "Output VAT"')
                    // ->whereRaw('chart_of_accounts.name != "Sales Shipping Charge"')
                    // ->where('contacts.name = "Sales Discount"');
                    ->where('contacts.business_name', 'like', '%'.$this->search_order.'%')
                    ->orWhere('contacts.mobile', 'like', '%'.$this->search_order.'%')
                    ->orWhere('contacts.first_name', 'like', '%'.$this->search_order.'%')
                    ->orWhere('contacts.shipping_address', 'like', '%'.$this->search_order.'%')
                    ->orWhere('total_amount', 'like', '%'.$this->search_order.'%');
            })->orWhere('code', 'like', '%'.$this->search_order.'%');
        }
        $this->status = '';

        return view('livewire.backend.order.delivered-order-list', [
            'deliveredOrders' => $order->get(),
        ]);
    }
}

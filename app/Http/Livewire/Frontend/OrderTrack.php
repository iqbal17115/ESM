<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class OrderTrack extends Component
{
    public function render()
    {
        return view('frontend.order-track')
              ->layout('layouts.front_end');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('ecommerce.checkout', [
            'divisions' => Division::all(),
        ]);
    }
}

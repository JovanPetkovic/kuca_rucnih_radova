<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function index():View{
        return View('order.index',[
            'orders' => Order::all()
        ]);
    }

    public function store(Request $request):RedirectResponse{



        $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'delivery_instructions' => 'required|string',
            'email_address' => 'required|email',
        ]);

        $order = Order::create([
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'street_address' => $request->input('street_address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'delivery_instructions' => $request->input('delivery_instructions'),
            'email_address' => $request->input('email_address'),
            'country' => 'Serbia',
            'order_date' => date('Y-m-d H:i:s')
        ]);

        $cartItems = session()->get('cart');

        foreach($cartItems as $item) $item->orders()->attach($order);
        session()->put('cart',null);
        return redirect()->back();

    }

}

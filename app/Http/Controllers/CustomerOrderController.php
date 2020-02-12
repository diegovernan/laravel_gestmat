<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use App\Inventory;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $customerorders = CustomerOrder::where('user_id', auth()->user()->id)->latest()->paginate(10);

        $products = Product::where('user_id', auth()->user()->id)->latest()->get();

        $customers = Customer::where('user_id', auth()->user()->id)->latest()->get();
        
        return view('main.customerorders', compact('customerorders', 'products', 'customers'));
    }

    public function store(Request $request)
    {
        $customerorder = new CustomerOrder();
        $customerorder->user_id = auth()->user()->id;
        $customerorder->product_id = $request->product_id;
        $customerorder->customer_id = $request->customer_id;
        $customerorder->order_at = $request->order_at;
        $customerorder->quantity = $request->quantity;
        $customerorder->price = $request->quantity * $customerorder->product->price;

        $customerorder->save();

        Inventory::where('product_id', $customerorder->product_id)->increment('sold_quantity', $customerorder->quantity);

        Inventory::where('product_id', $customerorder->product_id)->decrement('available_quantity', $customerorder->quantity);

        return redirect()->back()->with('success', 'Solicitação enviada com sucesso!');
    }
}

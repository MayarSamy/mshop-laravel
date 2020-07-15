<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Payment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searched = $request->query('search');
        return view('admin\order\index', [
            'orders'=>Order::where('date', 'LIKE', "%{$searched}%")
            ->paginate($request->query('limit', 10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin\order\create', [
            'products'=>Product::all(),
            'customers'=>Customer::all(),
            'payments'=>Payment::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $request->merge([
            'user_id' =>$request->user()->id
        ]);
        $order = Order::create($request->all());
        
        //nedd to do the validation that the quantity is less or equal yhe product quantity 
        
        $order->products()->attach($request->get('products'));
        $order->save();

        return redirect(route('admin.orders.show', $order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin\order\show', [
            'order'=> $order,
            'products'=>$order->products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin\order\edit', [
            'order'=> $order,
            'products'=>$order->products->all(),
            'customers'=>$order->customer(),
            'payments'=>$order->payment()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        $data['orders'] = Cart::all();
        $data['jumlah'] = null;
        foreach( $data['orders'] as $order){
            $data['jumlah'] = $data['jumlah'] + $order->price; 
        }
        $data['pajak'] = 11 / 100 * $data['jumlah']; 
        $data['tagihan'] = $data['jumlah'] + $data['pajak']; 
        return view('cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $cart = Cart::create([
            'product_id' => $request->product_id,
            'count' => $request->count,
            'price' =>  ((( 100 -  $product->discount) / 100 ) * ( $request->count * $product->price ))
        ]);
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $product = Product::find($cart->product_id);
        $cart->update([
            'count' => $request->count,
            'price' =>  ((( 100 -  $product->discount) / 100 ) * ( $request->count * $product->price ))
        ]);
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);

        return redirect('/cart');
    }
}

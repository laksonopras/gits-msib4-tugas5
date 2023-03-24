<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item_order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transactions'] = Transaction::all();

        return view('history', $data);
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
        $transaction_id = Str::random(8);
        $items = Cart::all();
        $sum_price = 0;
        $trasaction = Transaction::create([
            'transaction_id' => $transaction_id
        ]);
        foreach($items as $item){
            $item = Item_order::create([
                'transaction_id' => $transaction_id,
                'product_name' => $item->product->product_name,
                'count' => $item->count,
                'price' => $item->product->price,
                'discount' => $item->product->discount,
                'sum_price' => $item->price
            ]);
            $sum_price = $sum_price + $item->sum_price;
        }
        $pajak = (11/100 * $sum_price);
        $bill = ($sum_price + $pajak);

        $trasaction->update([
            'transaction_id' => $transaction_id,
            'item_total' => $sum_price,
            'pajak' => $pajak,
            'sum_price' => $bill,
            'pay' => $request->pay,
            'change' => ($request->pay - $bill)
        ]);

        Cart::truncate();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

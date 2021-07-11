<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cart = session('cart');
        $data = $request->validate([
            'barcode' => 'required|string'
        ]);
        $item = Product::query()->where('barcode', $data['barcode'])->first();

        if(!$item) return redirect()->back();

        if(!$cart) {
            $cart = [
                $item->id => [
                    'name' => $item->name,
                    'quantity' => 1,
                    'price' => $item->price
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back();
        }

        if(isset($cart[$item->id])) {
            $cart[$item->id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back();
        }

        $cart[$item->id] = [
            'name' => $item->name,
            'quantity' => 1,
            'price' => $item->price
        ];

        session()->put('cart', $cart);

        return redirect()->back();
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

<?php

namespace App\Http\Controllers;

use App\City;
use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use App\Order;

class ProductController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $comments = Comment::parentComments($product->id);
        $suggestedProducts = Product::suggestedProducts($product->category_id);
        $cities = City::cities();

        return view('client.product.product', compact('product', 'comments', 'suggestedProducts', 'cities'));
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

    public function order(Request $request, Product $product)
    {
        $is_active = true;
        $is_bought = $request->user()->isBought($product->id);
        $city = City::find($request->shipping);
        $own_product = $product->user_id == $request->user()->id;
        if ($product->status == 0 || $is_bought == true || $city == null || $own_product) {
            $is_active = false;
        }

        return view('client.order.index', compact('product', 'is_active', 'city'));
    }

    public function buy(Request $request, Product $product)
    {
        $order_information = $request->except('_token');
        $request->user()->orders()->save($product, $order_information);

        return redirect()->route('index');
    }
}

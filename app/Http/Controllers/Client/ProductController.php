<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;
use App\Category;
use App\City;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function postProduct()
    {
        $categories = Category::convertToArray();
        $cities = City::convertToArray();
        
        return view('client.product.new', compact('categories', 'cities'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['thumbnail'] = 'default.jpg'; 
        if ($request->has('thumbnail')) {
            $data['thumbnail'] = $request->thumbnail->hashName(); 
            $request->thumbnail->store('public');
        }

        $product = $request->user()->products()->create($data);

        if ($request->has('image_data')) {
            $imageIds = explode(',', $request->image_data);
            if (count($imageIds) > 0) {
                Image::whereIn('id', $imageIds)->update([
                    'product_id' => $product->id
                ]);
            }
        }

        return redirect()->route('index');
    }

    public function uploadImage(Request $request)
    {

        if(!$request->has('file') || count($request->file) < 1){
            return response()->json([
                'error' => true
            ]);
        }

        $data = [];

        foreach ($request->file as $image) {
            $imageModel = Image::create([
                'file_name' => $image->hashName(),
            ]);
            $image->store('public');
            $data[] = $imageModel->id;
        }

        return response()->json($data);
    }

    public function getMyProducts(Request $request)
    {
        $products = $request->user()->getMyProducts();

        return view('client.user.myproduct', compact('products'));
    }

    public function changeStatus(Product $product)
    {
        $this->authorize('status', $product);
        $status = $product->status == 1 ? 0 : 1;
        $product->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    public function myPurchases(Request $request)
    {
        $orders = $request->user()->getMyPurchases();

        return view('client.user.mypurchases', compact('orders'));
    }
}

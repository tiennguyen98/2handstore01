<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::list()->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        
        return response()->json([
            'status' => 'success'
        ]);
    }
}

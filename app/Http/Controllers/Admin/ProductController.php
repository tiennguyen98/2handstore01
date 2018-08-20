<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Notifications\DeleteProduct;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::list()->paginate(config('database.paginate'));
        
        if ($request->ajax()) {
            return view('admin.products.content', compact('products'));
        }

        return view('admin.products.index', compact('products'));
    }

    public function destroy(Product $product)
    {
        $old_product = $product;
        $product->delete();
        $product->user->notify(new DeleteProduct($old_product));

        return response()->json([
            'status' => 'success'
        ]);
    }
}

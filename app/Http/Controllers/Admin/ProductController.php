<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Notifications\DeleteProduct;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->listProduct($request->search);
        
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

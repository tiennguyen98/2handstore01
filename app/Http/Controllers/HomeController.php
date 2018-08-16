<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::latest()->get();
        $categories = Category::get();
        $new_products = Product::latest()->available()->withProvince()->paginate(config('database.homepaginate'));

        return view('client.homepage', compact('categories', 'new_products', 'slides'));
    }

    public function adminIndex()
    {
        return view('admin.dashboard');
    }

    public function loadMoreProduct(Request $request)
    {
        $products = Product::latest()->paginate(config('database.homepaginate'));
        if ($request->page > $products->lastPage()) {
            return response()->json([
                'lastpage' => true
            ]);
        }

        return view('client.product.loadmore', compact('products'));
    }
}

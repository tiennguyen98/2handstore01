<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request, $slug)
    {
        try {
            $getCategory = Category::findBySlug($slug);
            if ($getCategory == false) {
                abort(404);
            }
            $sort = [
                'sortBy' => 'created_at',
                'type' => 'DESC'
            ];
            if ($request->has('sortBy')) {
                $sort['sortBy'] = $request->sortBy;
            }
            if ($request->has('type')) {
                $sort['type'] = $request->type;
            }
            $products = $getCategory->getProducts($sort);

            return view('client.product.category', compact('products', 'getCategory'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\City;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $cityRepository;

    public function __construct(CategoryRepository $categoryRepository, CityRepository $cityRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index(Request $request, $slug)
    {
        try {
            $getCategory = $this->categoryRepository->findBySlug($slug);
            $categories = $this->categoryRepository->arrayCategories();
            $cities = $this->cityRepository->cities();
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

            return view('client.product.category', compact('products', 'getCategory', 'cities', 'categories'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}

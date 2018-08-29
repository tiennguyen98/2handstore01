<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use App\Comment;
use App\Product;
use App\Category;
use App\Province;
use Illuminate\Http\Request;
use App\Notification;
use App\Events\OrderEvent;
use App\Repositories\NotifyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CommentRepository;
use App\Repositories\CityRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProvinceRepository;

class ProductController extends Controller
{
    private $notify;
    protected $productRepository;
    protected $commentRepository;
    protected $cityRepository;
    protected $categoryRepository;
    protected $provinceRepository;

    public function __construct(
        ProductRepository $productRepository,
        CommentRepository $commentRepository,
        CityRepository $cityRepository,
        CategoryRepository $categoryRepository,
        ProvinceRepository $provinceRepository,
        NotifyRepository $notifyRepository
    ) {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->provinceRepository = $provinceRepository;
        $this->notify = $notifyRepository;
    }
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
        $comments = $this->commentRepository->parentComments($product->id);
        $suggestedProducts = $this->productRepository->suggestedProducts($product->category_id);
        $cities = $this->cityRepository->cities();

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
        $this->validate(
            $request,
            [
                'city_id' => 'required',
                'address' => 'required',
                'price' => 'required|min:0|max:' . $product->price,
            ]
        );
        $order_information = $request->except('_token');
        $request->user()->orders()->save($product, $order_information);
        event(new OrderEvent(
            $product->user->id,
            __('notify.neworder', ['name' => $product->name]),
            route('client.orders')
        ));
        $notify = [
            'content' => __('notify.neworder.insert'),
            'detail' => $product->name,
            'user_id' => $product->user->id,
            'link' => route('client.orders')
        ];
        $this->notify->create($notify);

        return redirect()->route('client.purchases.index');
    }
    
    public function getSearchOrderBy(Request $request)
    {
        if ($request->orderBy) {
            return;
        }
        switch ($request->sort) {
            case '1':
                $request->request->add([
                    'orderBy' => 'price',
                    'type' => 'desc'
                ]);
                break;
            case '2':
                $request->request->add([
                    'orderBy' => 'updated_at',
                    'type' => 'desc'
                ]);
                break;
            case '3':
                $request->request->add([
                    'orderBy' => 'updated_at',
                    'type' => 'asc'
                ]);
                break;
            default:
                $request->request->add([
                    'orderBy' => 'price',
                    'type' => 'asc'
                ]);
                break;
        }
    }

    public function search(Request $request)
    {
        $this->getSearchOrderBy($request);
        $products = $this->productRepository->searchProduct($request);
        $categories = ['' => __('Choose category')] + $this->categoryRepository->arrayCategories();
        $cities = ['' => __('Choose city')] + $this->cityRepository->cities();
        $province = [''];
        if ($request->city) {
            $province = $this->provinceRepository->getProvinces($request->city);
        }
        session()->flashInput($request->input());
        
        return view('client.product.category', compact('products', 'categories', 'cities', 'province'));
    }

    public function getSearchProvince(Request $request)
    {
        $province = [__('client.category.province')] + $this->provinceRepository->getProvinces($request->id);

        return response()->json($province);
    }

    public function result(Request $request)
    {
        $products = $this->productRepository->searchProduct($request)->take(config('database.autocomplete'));

        return view('client.product.result', compact('products'));
    }
}

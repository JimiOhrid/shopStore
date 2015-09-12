<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Requests;


class StoreController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var Product
     */
    private $product;


    /**
     * @param Category $category
     * @param Product $product
     */
    function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;

    }

    /**
     * Show the store application to the user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->category->orderBy('name')->get();
        $recommends = $this->product->where('recommended','=', '1')->paginate(16);
        return view('ecomm.shop.index', compact('categories','recommends'));
    }

    /**
     * Show all products by category id.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function category($id)
    {
        $categories = $this->category->orderBy('name')->get();
        $products=$this->product->where('category_id', '=', $id)->paginate(8);
        $categoryName=$this->category->find($id)->name;
        return view('ecomm.shop.partial.products-category', compact('categories', 'products','categoryName'));
    }


    public function product($id)
    {
        $categories = $this->category->orderBy('name')->get();
        $product = $this->product->find($id);
        return view('ecomm.shop.partial.product-details', compact('categories', 'product'));
    }
}

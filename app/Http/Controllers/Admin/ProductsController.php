<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductsRequest;
use App\Http\Requests\ProductImageRequest;
use App\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * ProductsController constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Method for showing all the products stored in the database.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('ecomm.admin.products.index', compact('products'));
    }

    /**
     * Method for showing the form for creating a product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('ecomm.admin.products.create', compact('categories'));
    }

    /**
     * Method for storing a new product in the database.
     *
     * @param ProductsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductsRequest $request)
    {
        $product = new Product($request->all());
        $product->save();
        return redirect(route('products'))->withSuccess('You have successfully created a new product.');
    }

    /**
     * Method that shows as a form for editing a product.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::lists('name', 'id');
        return view('ecomm.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Method for updating the currrently edited product.
     *
     * @param ProductsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductsRequest $request, $id)
    {
        Product::find($id)->update($request->all());
        return redirect(route('products'))->withSuccess('You have successfully updated a product.');
    }

    /**
     * Method for removing a product from the database.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect(route('products'))->withSuccess('You have successfully removed a product.');
    }

    /**
     * Return a list of all the images from a product.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function images($id)
    {
        $product = Product::find($id);
        return view('ecomm.admin.products.images', compact('product'));
    }

    /**
     * Method for showing the form for creating the image.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function createImage($id)
    {
        $product = Product::find($id);
        return view('ecomm.admin.products.create-image', compact('product'));
    }

    /**
     * Method for storing an image in the public folder.
     *
     * @param ProductImageRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeImage(ProductImageRequest $request, $id)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = ProductImage::create(['product_id' => $id, 'extension' => $extension]);
        Storage::disk('public')->put($image->id . '.' . $extension, File::get($file));
        return redirect(route('products.images', ['id' => $id]))->withSuccess('You have successfully created an image.');
    }

    /**
     * Remove an image from the public folder.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage($id)
    {
        $image = ProductImage::find($id);
        if (Storage::disk('public')->exists($image->id . '.' . $image->extension)) {
            Storage::disk('public')->delete($image->id . '.' . $image->extension);
        }
        $product = $image->product;
        $image->delete();
        return redirect()->route('products.images', ['id' => $product->id])->withSuccess('You have successfully removed an image.');
    }

}

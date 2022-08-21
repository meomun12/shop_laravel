<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //$products = Product::all();

        $productsGet = Product::select('id', 'name', 'price', 'category_id','description','status')
            ->with('category', function ($query) {
                $query->select('id', 'name' );
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('product.index', ['products' => $productsGet]);
        // dd('Danh sach category', $categories, $categoriesGet);
    }

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $productRequest = $request->all();
        $product = new Product();
        $product->name = $productRequest['name'];
        $product->description = $productRequest['description'];
        $product->price = $productRequest['price'];
        $product->image_url = $productRequest['image_url'];
        $product->status = $productRequest['status'];
        $product->category_id = $productRequest['category_id'];
        // use Illuminate\Support\Str;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Product $id)
    {

       $products = $id->products;

        $productsWithPaginate = $id

            ->products()->select('name')->paginate(10);
       return view('product.create', [
            'product' => $id,
            'products' => $productsWithPaginate
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProductRequest $request, Product $id)
    {
        $product = Product::findOrFail($id); $product->update($request->all());



        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Xoa 1 ban ghi product
    public function delete(Product $pro)
    {
        // Neu muon su dung model binding
        // 1. Dinh nghia kieu tham so truyen vao la model tuong ung
        // 2. Tham so o route === ten tham so truyen vao ham
        if ($pro->delete()) {
            return redirect()->route('products.index');
        }

        // Cach 1: destroy, tra ve id cua thang duoc xoa
        // Chi ap dung khi nhan vao tham so la gia tri
        // Neu k xoa duoc thi tra ve 0
        //$productDelete = Product::destroy($id);
        //if ($productDelete !== 0) {
            //return redirect()->route('products.index');
        //}
        // dd($categoryDelete);

        // Cach 2: delete, tra ve true hoac false
        // $category = Category::find($id);
        // $category->delete();
    }

}

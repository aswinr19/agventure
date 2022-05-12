<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {

        $id = $request->session()->get('loggedUser');

        $products = Product::latest()
            ->where('user_id', $id)->get();

        return view('products.index', ['title' => 'Products page', 'products' => $products]);

    }

    public function show($id)
    {

        $product = Product::findOrFail($id);
        return view('products.show', ['title' => 'Product page', 'product' => $product]);

    }

    public function create()
    {

        $categories = Category::all();
        return view('products.create', ['title' => 'Create product page', 'categories' => $categories]);

    }
    public function store(Request $request)
    {

        $request->validate([

            'product_name' => 'required|min:2',
            'product_description' => 'required|min:10|max:1000',
            'product_price' => 'required|numeric|digits_between:2,5',
            'category' => 'required',
            'quantity' => 'required|numeric|digits_between:2,5',
            // 'product_image' => 'required|max:5048',
            'suitable_crops' => 'required|min:10|max:1000',
            'recommended_crops' => 'required|min:10|max:1000',
            'composition' => 'required|min:2|max:1000',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:5048',

        ]);
        //  dd($validatedData);
        $newImageName = time() . '-' . $request->product_name . '.' .
        $request->product_image->extension();

        // dd($newImageName);

        $request->product_image->move(public_path('images'), $newImageName);

        $product = new Product();
        $product->name = $request->product_name;
        $product->user_id = $request->session()->get('loggedUser');
        $product->description = $request->product_description;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->product_price;
        $product->image = $newImageName;
        $product->suitable_crops = $request->suitable_crops;
        $product->recommended_crops = $request->recommended_crops;
        $product->composition = $request->composition;

        $product->save();
        return redirect('/admin/products');

    }
    public function update($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.update', ['title' => 'Update product page', 'product' => $product, 'categories' => $categories]);
    }
    public function change(Request $request)
    {

        $request->validate([

            'product_name' => 'required|min:2|',
            'product_description' => 'required|min:10|max:1000',
            'product_price' => 'required|numeric|digits_between:2,5',
            'category' => 'required',
            'quantity' => 'required|numeric|digits_between:2,5',
            // 'product_image' => 'required|max:5048',
            'suitable_crops' => 'required|min:10|max:1000',
            'recommended_crops' => 'required|min:10|max:1000',
            'composition' => 'required|min:2|max:1000',
            // 'product_image' => 'required|mimes:jpg,png,jpeg|max:5048',

        ]);
        //  dd($validatedData);
        // $newImageName = time().'-'. $request->product_name.'.'.
        // $request->product_image->extension();

        // // dd($newImageName);

        // $request->product_image->move(public_path('images'),$newImageName);

        $product = Product::findOrFail($request->id);
        $product->user_id = $request->session()->get('loggedUser');
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->category_id = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->product_price;
        $product->image = $request->product_image;
        $product->suitable_crops = $request->suitable_crops;
        $product->recommended_crops = $request->recommended_crops;
        $product->composition = $request->composition;
        $product->save();

        return redirect('/admin/products');

    }
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/admin/products');
    }

    public function display()
    {

        $products = Product::latest();

        if (request('search')) {

            $products
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if (request('category')) {

            $products
                ->where('category_id', request('category'));
        }

        return view('products.display', ['title' => 'Products page', 'products' => $products->get()]);
    }

    public function displayOne($id)
    {

        $product = Product::findOrFail($id);

        return view('products.displayOne', ['title' => 'Product page', 'product' => $product]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function index(){

        $products = Product::all();

        return view('products.index',['title'=>'Products page','products'=>$products]);        

    }


    public function show($id) {
        return view('products.show',['title'=>'Product page']);
    }


    public function create(){

        return view('products.create',['title'=>'Create product page']);

    }
    public function store(Request $request){

        $validatedData = $request->validate([

            'product_name' => 'required|min:2',
            'product_description' => 'required',
            'product_price' => 'required',
            'category' => 'required',
            'quantity' => 'required',
            // 'product_image' => 'required|max:5048',
            'suitable_crops' => 'required',
            'recommended_crops' => 'required',
            'composition' => 'required',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:5048',


        ]);
        //  dd($validatedData);
        $newImageName = time().'-'. $request->product_name.'.'. 
        $request->product_image->extension();

        // dd($newImageName);

        $request->product_image->move(public_path('images'),$newImageName);


        $product = new Product();
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->product_price;
        $product->image = $newImageName;
        $product->suitable_crops = $request->suitable_crops;
        $product->reccomended_crops = $request->recommended_crops;
        $product->composition = $request->composition;

        $product->save();

    }
}
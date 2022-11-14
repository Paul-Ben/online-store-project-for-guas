<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {   
        $categories = Category::all('category_name');
        // dd($check);
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_id' => 'required',
            'product_price' => 'required',
            'product_category' => 'required'
        ]);

        $requestData = $request->all();
        $filename = time().$request->file('product_image')->getClientOriginalName();
        $path = $request->file('product_image')->storeAs('product_images', $filename, 'public');
        $requestData['product_image'] = '/storage/'.$path;

        
        Product::create($requestData);

        return redirect()->route('products.index')->with('success','Product has been created successfully.');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        
    }

    public function show_all(Product $product)
    {
        $check = Product::exists();
        if($check)
        {
            $products = Product::orderBy('id', 'desc')->paginate(10);
            return view('products.view_all', compact('products'));
            
        }else {
            // Session::flash('message', 'No products available.');
            return view('products.index')->with('error', 'No products available.' );

        }
        
            
        
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_id' => 'required',
            'product_category' => 'required',
            'featured_product' => 'required',
            'recommended_product' => 'required',
            'on_sale' => 'required'
        ]);

        $product->fill($request->post())->save();
        return redirect()->route('products.index')->with('success', 'Product Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted succesfully.');
    }


}

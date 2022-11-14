<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Session;

class pagesController extends Controller
{
    public function index(Category $category, Product $product)
    {
        $categories = Category::all('category_name');
        $featureds = Product::inRandomOrder()->where('featured_product', 1)->get();
        $rec_items = Product::inRandomOrder()->where('recommended_product', 1)->paginate(3);
        $rec_items2 = Product::latest()->where('recommended_product', 1)->paginate(3);
        // dd($rec_items);
        return view('pages.index', compact('categories', 'featureds', 'rec_items', 'rec_items2'));
    }

    public function products(Product $product, Category $category)
    {
        $products = Product::inRandomOrder()->paginate(9);
        $categories = Category::all('category_name');
        
        return view('pages.products', compact('products'), compact('categories'));
    }

    public function contactpage()
    {
        return view('pages.contact');
    }

    public function dashdata(Product $product, Category $category)
    {
        $categories = Category::all();
        $products = Product::all();
        return view('pages.dashdata', compact('categories', 'products'));
    }

    public function aboutpage()
    {
        return view('pages.about');
    }

    public function featured_details_page(Product $featured)
    {
        $query = Session::get($featured->id);
        // dd($query);
        
        return view('pages.product_details', compact('featured'));
    }
}

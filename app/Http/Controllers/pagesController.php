<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\ClosedOrder;
use Session;

class pagesController extends Controller
{
    public function index(Category $category, Product $product, Cart $cart)
    {
        $categories = Category::all('category_name', 'id');
        $featureds = Product::inRandomOrder()->where('featured_product', 1)->get();
        $rec_items = Product::inRandomOrder()->where('recommended_product', 1)->paginate(3);
        
        
        
        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            return view('pages.index', compact('categories', 'featureds', 'rec_items', 'count'));
        }else {
            return view('pages.index', compact('categories', 'featureds', 'rec_items'));
        }
      
        
    }

    public function products(Product $product, Category $category, Cart $cart)
    {
        $products = Product::inRandomOrder()->paginate(9);
        $categories = Category::all('category_name', 'id');
        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            return view('pages.products', compact('products', 'categories', 'count'));
        }else {
            return view('pages.products', compact('products','categories'));
        }
        
    }

    public function contactpage(Cart $cart)
    {
        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            return view('pages.contact', compact('count'));
        }else {
            return view('pages.contact');
        }
        
    }

    public function dashdata(Product $product, Category $category, Order $orders)
    {
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();
        return view('pages.dashdata', compact('categories', 'products', 'orders'));
    }

    public function aboutpage(Cart $cart)
    {
        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            return view('pages.about', compact('count'));
        }else {
            return view('pages.about');
        }
        
    }

    public function featured_details_page(Request $request, Cart $cart)
    {
        $categories = Category::all('category_name', 'id');
         $featured = Product::where('id', $request->id)->first();
         if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            return view('pages.product_details', compact('featured', 'count', 'categories'));
        }else {
            return view('pages.product_details', compact('featured'));
        }     
        
    }

    public function orders()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        
        return view('pages.orderlist', compact('orders'));
    }

    public function closedOrders()
    {
        $closedorders = ClosedOrder::orderBy('id', 'desc')->paginate(10);

        return view('pages.closedOrders', compact('closedorders'));
    }

    public function viewSingleOrder(Request $request, Order $order)
    {
        $order = Order::where('id', $request->id)->first();
        
        return view('pages.orderprofile', compact('order'));
    }

    public function editOrder(Request $request, Order $order)
    {
        $order = Order::where('id', $request->id)->first();
        
        return view('pages.editOrder', compact('order'));
    }

    public function updateOrder(Request $request, Order $order)
    {
        $request->validate([

            'order_status' => 'required',
            'payment_status' => 'required'

        ]);

        $order = Order::where('id', $request->id)->first();

        $order->order_status = $request->order_status;
        $order->payment_status = $request->payment_status;

        $order->save();

        return redirect()->route('orders')->with('message', 'Order Updated.');
    }

    public function deleteOrder(Request $request, Order $order)
    {
        $order = Order::where('id', $request->id)->first();

        $order->delete();
        return redirect()->route('orders')->with('message', 'Order successfuly deleted.');
    }

    public function deletecloseOrder(Request $request)
    {
        $closedorder = ClosedOrder::where('id', $request->id)->first();

        $closedorder->delete();
        return redirect()->back()->with('message', 'Order successfuly deleted.');
    }

    public function closeOrder($id)
    {
        $orderData = Order::where('id', $id)->first();
        //dd($orderData);
        $closedorder = new ClosedOrder;
    
                $closedorder->customer_name = $orderData->customer_name;
                $closedorder->customer_phone = $orderData->customer_phone;
                $closedorder->customer_email = $orderData->customer_email;
                $closedorder->customer_address = $orderData->customer_address;
                $closedorder->customer_id = $orderData->customer_id;
                $closedorder->product_name = $orderData->product_name;
                $closedorder->product_category = $orderData->product_category;
                $closedorder->product_id = $orderData->product_id;
                $closedorder->product_price = $orderData->product_price;
                $closedorder->product_image = $orderData->product_image;
                $closedorder->product_quantity = $orderData->product_quantity;
    
                $closedorder->order_status = $orderData->order_status;
                $closedorder->payment_status = $orderData->payment_status;
                $closedorder->order_id = $orderData->order_number;
    
                $closedorder->save();
    
                $order_id = $orderData->id;
                
    
                $order = Order::find($order_id);
                
                $order->delete();
        return redirect()->back()->with('message', 'Order Closed');
    }

    public function myOrder(Order $order)
    {
        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            $orders = Order::where('customer_name', $user->name)->orderBy('id', 'desc')->paginate(10);
            return view('pages.myOrders', compact('orders', 'count'));
        }else {
            return view('pages.myOrders');
        }
        
    }

    public function categoryProducts(Category $category, Request $request)
    {
        $categories = Category::all('category_name', 'id');
        $cat_name = Category::where('id', $request->id)->first();
        $product = Product::where('product_category', $cat_name->category_name)->inRandomOrder()->paginate(9);

        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            return view('pages.categoryProducts', compact('product', 'categories', 'count'));
        }else {
            return view('pages.categoryProducts', compact('product', 'categories'));
        }
        
    }
}

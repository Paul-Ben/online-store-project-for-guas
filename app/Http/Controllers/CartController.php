<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function cash_order()
    {
        
        $user = Auth::user();
        $userid = $user->user_id;
        $orderData = Cart::where('customer_id', $userid)->get();
        $item_in_cart = Cart::where('customer_id', $userid)->exists();
        

        if ($item_in_cart) {

            foreach ($orderData as $orderData ) {
            
                $order = new Order;
    
                $order->customer_name = $orderData->customer_name;
                $order->customer_phone = $orderData->customer_phone;
                $order->customer_email = $orderData->customer_email;
                $order->customer_address = $orderData->customer_address;
                $order->customer_id = $orderData->customer_id;
                $order->product_name = $orderData->product_name;
                $order->product_category = $orderData->product_category;
                $order->product_id = $orderData->product_id;
                $order->product_price = $orderData->product_price;
                $order->product_image = $orderData->product_image;
                $order->product_quantity = $orderData->product_quantity;
    
                $order->order_status = 'Processing';
                $order->payment_Status = 'Processing';
                $order->order_number = 'GUAS'.(random_int(0000001,9999999));
    
                $order->save();
    
                $cart_id = $orderData->id;
                
    
                $cart = Cart::find($cart_id);
                
                $cart->delete();
    
            }
            return redirect()->back()->with('message', 'Your order is being processed. You have no more items in your cart.');
        }else {
            return redirect()->back()->with('message', 'You have no items in your cart.');
            
        }
        
        

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
    public function store(Request $request, $id)
    {  
        if (Auth::id()) {
           $customer = auth()->user();

           $product = Product::find($id);


           $cart = new Cart;
           $cart->customer_name = $customer->name;
           $cart->customer_phone = $customer->phone;
           $cart->customer_email = $customer->email;
           $cart->customer_address = $customer->address;
           $cart->customer_id = $customer->user_id;

           $cart->product_id = $product->product_id;
           $cart->product_name = $product->product_name;
           $cart->product_category = $product->product_category;
           $cart->product_price = (floatval($product->product_price) * floatval($request->purchase_quantity));
           $cart->product_image = $product->product_image;
           $cart->product_quantity = $request->purchase_quantity;

           $cart->save();


            return redirect()->back()->with('message', 'Product added to cart successfully.');
        }else {
            return redirect()->route('login');
        }
     

       

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart, Request $request)
    {
        if (Auth()->user()) {
            $user =  auth()->user();
            $count = Cart::where('customer_name', $user->name)->count();
            $cart_items = Cart::all()->where('customer_name', $user->name);
            
            // $price = Cart::select('product_price')->where('customer_name', $user->name)->get();
           
            // dd($price);
            
            return view('pages.cart', compact('count', 'cart_items'));
        }else {
            return view('pages.cart')->with('message', 'No items in the cart.');
        }
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
    public function destroy(Cart $cart)
    {
       $cart->delete();
       return redirect()->back()->with('success', 'Category deleted successfuly.');

    }
}

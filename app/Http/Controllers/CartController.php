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

    public function pay_callback()
    {
        $response = json_decode($this->verify_payment(request('reference')));
         
        if ($response)
        {
            if($response->status && Auth()->user()){

                $user =  auth()->user();
                $username = $user->name;
                $count = Cart::where('customer_name', $user->name)->count();
                $data = $response->data;
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
                        $order->payment_Status = 'Paid';
                        $order->order_number = 'GUAS'.(random_int(0000001,9999999));
            
                        $order->save();
            
                        $cart_id = $orderData->id;
                        
            
                        $cart = Cart::find($cart_id);
                        
                        $cart->delete();
            
                    }
                }


                return view('pages.callback_page')->with(compact(['data', 'count', 'username']));
            }else{
                return back()->withError($response->message);
            }
             
        }else
        {
            return back()->withError('Something is wrong!!!');
        }
    }


    public function cardPay($totalPrice, Request $request)
    {
        
        $user = Auth::user();
        $username = $user->name;
        $userid = $user->user_id;
        $orderData = Cart::where('customer_id', $userid)->first('customer_name');
        $orderDatae = Cart::where('customer_id', $userid)->first('customer_email');
        
        
        $item_in_cart = Cart::where('customer_id', $userid)->exists();
        if ($item_in_cart) {
            $payData=[
                'email' => $orderDatae->customer_email,
                'amount' => $request->totalPrice *100,
                'first_name' => $orderData->customer_name,
                'callback_url' => route('pay_callback')
            ];

           

            $pay = json_decode($this->initiate_payment($payData));
        
            if ($pay)
            {
                if($pay->status){

                    //dd($pay);

                    return redirect($pay->data->authorization_url);

                }else{
                    return back()->withError($pay->message);
                }
                
            }else
            {
                return back()->withError('Something is wrong check your network provider!!!');
            }

        }else {  
            return redirect()->back()->with('message', 'You have no items in your cart.');
        }         

    }

    public function initiate_payment($payData)
    {
        $url =  "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($payData);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-Control: no-cache",
        ));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function verify_payment($reference)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-Control: no-cache",
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response; 
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

                $product = Product::find($id);
                $customer = auth()->user();
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

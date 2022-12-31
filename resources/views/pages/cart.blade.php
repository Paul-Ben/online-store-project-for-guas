@extends('layouts.homeLayout')

@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <p>{{ session()->get('message') }}</p>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <p>{{ session()->get('error') }}</p>
</div>
@endif

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        {{-- <td class="total"></td> --}}
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    <?php $totalPrice = 0; ?>
                    @foreach ($cart_items as $cart_item)
                        
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{$cart_item->product_image}}" width="100" height="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cart_item->product_name}}</a></h4>
                            <p>Web ID: {{$cart_item->product_id}}</p>
                        </td>
                        <td class="cart_price">
                             <p>NGN {{number_format($cart_item->product_price)}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_item->product_quantity}}" autocomplete="off" size="2" disabled>
                                {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                            </div>
                        </td>
                        {{-- <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td> --}}
                        <td class="cart_delete">
                            <form action="{{ route('cart.destroy',$cart_item->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to remove this item?')" class="btn btn-danger">Remove</button>
                            </form>
                            
                        </td>
                    </tr>
                    <?php $totalPrice = $totalPrice + floatVal($cart_item->product_price); ?>
                    @endforeach
                    {{-- <tr>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>NGN {{$totalPrice}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>NGN {{$totalPrice}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Order Summary</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>NGN {{number_format($totalPrice)}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>NGN {{number_format($totalPrice)}}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="{{route('cash_order')}}">Cash on Delivery</a>
                        <a class="btn btn-default check_out" href="{{route('cardPay',$totalPrice)}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
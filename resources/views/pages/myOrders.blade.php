@extends('layouts.homeLayout')

@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <p>{{ session()->get('message') }}</p>
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
                        <td class="total">Order Id</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>

                    <?php $totalPrice = 0; ?>
                    @foreach ($orders as $orders)
                        
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{$orders->product_image}}" width="100" height="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$orders->product_name}}</a></h4>
                            <p>Web ID: {{$orders->product_id}}</p>
                        </td>
                        <td class="cart_total_price">
                             <p>NGN {{number_format($orders->product_price)}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                {{-- <input class="cart_quantity_input" type="text" name="quantity" value="{{$orders->product_quantity}}" autocomplete="off" size="2" disabled> --}}
                                {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                <p>{{$orders->product_quantity}}</p>
                            </div>
                        </td>
                        <td class="cart_price">
                            <p class="cart_price">{{$orders->order_number}}</p>
                        </td>
                        <td class="cart_delete">
                            {{-- <form action="{{ route('cart.destroy',$cart_item->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to remove this item?')" class="btn btn-danger">Remove</button>
                            </form> --}}
                            {{$orders->order_status}}
                        </td>
                    </tr>
                    <?php $totalPrice = $totalPrice + floatVal($orders->product_price); ?>
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
            
        </div>
        <div class="row">
        
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Order Sub Total <span>NGN {{number_format($totalPrice)}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>NGN {{number_format($totalPrice)}}</span></li>
                    </ul>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
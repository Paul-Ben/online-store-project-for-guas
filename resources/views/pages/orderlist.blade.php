@extends('dashboard')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Alven International School SMS</h2>
            </div> --}}
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('dashboard') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="center">
            <h2>
                All Orders
            </h2>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>S.No</th> --}}
                <th>Product</th>
                <th>Name</th>
                <th>Price(NGN)</th>
                <th>Qty</th>
                <th>Email</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Order ID</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    
                    {{-- <td>{{ $fee->id }}</td> --}}
                    <td><img src="{{ asset($order->product_image) }}" alt="" width="120%" height="120%"></td>
                    <td>{{ $order->product_name}}</td>
                    <td>{{ $order->product_price}}</td>
                    <td>{{ $order->product_quantity}}</td>
                    <td>{{ $order->customer_email}}</td>
                    <td>{{ $order->customer_name}}</td>
                    <td>{{ $order->customer_phone}}</td>
                    <td>{{ $order->order_number}}</td>
                    <td>{{ $order->payment_status}}</td>
                    <td>{{ $order->order_status}}</td>
                   
                   
                    <td>
                        <form action="{{ route('closeOrder',$order->id) }}" method="Post">
                            <a class="btn btn-primary mb-4" href="{{ route('viewSingleOrder', $order->id) }}">View/Update</a>
                            {{-- <a class="btn btn-danger mt-4" href="{{ route('closeOrder', $order->id) }}">Close Order</a> --}}
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">Close Order</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    
</div>
<div class="row">
<div class="center">
    {!!$orders->links()!!}
</div>
</div>   
@endsection
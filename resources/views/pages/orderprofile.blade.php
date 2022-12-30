@extends('dashboard')
@section('content')
    

<!-- Student Profile -->
<link rel="stylesheet" href="{{ asset('assets/styles/studentProfile.css')}}">
<div class="student-profile py-4">
    <div class="container">
      <div class="row">
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('orders') }}"> Back</a>
      </div>
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
              <img class="profile_img" src="{{ asset($order->product_image)}}"  width="40%" alt="">
              <h3>{{ $order->product_name }}</h3>
            </div>
            <div class="card-body">
              <p class="mb-0"><strong class="pr-1">Product ID: </strong>{{ $order->product_id }}</p>
              <p class="mb-0"><strong class="pr-1">Price: </strong>{{ $order->product_price }}</p>
              <p class="mb-0"><strong class="pr-1">Quantity: </strong>{{ $order->product_quantity }}</p>
              <p class="mb-0"><strong class="pr-1">Order Status: </strong>{{ $order->order_status }}</p>
              <p class="mb-0"><strong class="pr-1">Payment Status: </strong>{{ $order->payment_status }}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="fa fa-clone pr-1"></i>Customer Information</h3>
            </div>
            <div class="card-body pt-0">
              
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Customer Name</th>
                  <td width="2%">:</td>
                  <td>{{ $order->customer_name }}</td>
                </tr>
                <tr>
                  <th width="30%">Email	</th>
                  <td width="2%">:</td>
                  <td>{{ $order->customer_email }}</td>
                </tr>
                <tr>
                  <th width="30%">Customer Id</th>
                  <td width="2%">:</td>
                  <td>{{ $order->customer_id }}</td>
                </tr>
                <tr>
                  <th width="30%">Delivery Address</th>
                  <td width="2%">:</td>
                  <td>{{ $order->customer_address }}</td>
                </tr>
                {{-- <tr>
                  <th width="30%">Allergies</th>
                  <td width="2%">:</td>
                  <td>{{ $order->allergies }}</td>
                </tr> --}}
                <tr>
                  <th width="30%">Edit/Delete Details</th>
                  <td width="2%">:</td>
                  <td>
                    <form action="{{ route('deleteOrder',$order->id) }}" method="Post"> 
                      <a class="btn btn-primary" href="{{ route('editOrder',$order->id) }}">Update</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  
                  </td>
                </tr>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
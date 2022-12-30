@extends('dashboard')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Order</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('orders') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('updateOrder', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Customer Name:</strong>
                        <input type="text" name="customer_name" value="{{ $order->customer_name }}" class="form-control"
                            placeholder="Registration Number">
                        @error('customer_name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Customer Phone:</strong>
                        <input type="text" name="customer_phone" value="{{ $order->customer_phone }}" class="form-control"
                            placeholder="Customer Phone" disabled>
                        @error('customer_phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Customer Email:</strong>
                        <input type="text" name="customer_email" class="form-control" placeholder="Middle Name"
                            value="{{ $order->customer_email }}">
                        @error('middleName')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Customer Address:</strong>
                        <input type="textbox" name="customer_address" rows="3" class="form-control" placeholder="Last Name"
                            value="{{ $order->customer_address }}">
                        @error('customer_address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" name="product_name" class="form-control" placeholder="Male"
                            value="{{ $order->product_name }}">
                        @error('gender')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="text" name="product_price" class="form-control" placeholder="DOB"
                            value="{{ $order->product_price }}">
                        @error('product_price')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Nationality:</strong>
                        <input type="text" name="nationality" class="form-control" placeholder="Nationality" value="{{ $order->nationality}}">
                        @error('nationality')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Quantity:</strong>
                        <input type="text" name="product_quantity" class="form-control" placeholder="State of Origin" value="{{ $order->product_quantity}}">
                        @error('product_quantity')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>LGA:</strong>
                        <input type="text" name="lga" class="form-control" placeholder="LGA" value="{{ $order->lga}}">
                        @error('lga')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
                
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Order Status:</strong>
                        <select class="form-control" name="order_status" aria-label="Default select example">
                            <option value="{{$order->order_status}}" selected>{{$order->order_status}}</option>
                            <option value="Processing">Processing</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                        @error('order_status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Payment Status:</strong>
                        <select class="form-control" name="payment_status" aria-label="Default select example">
                            <option value="{{$order->payment_status}}" selected>{{$order->payment_status}}</option>
                            <option value="Processing">Processing</option>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                        </select>
                        @error('payment_status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
            </div>
        </form>
    </div>
    @endsection
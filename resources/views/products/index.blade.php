@extends('dashboard')
@section('content')
<div class="container">
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($error = Session::get('error'))
            <div class="alert alert-error">
                <p>{{$error}}</p>
            </div>
            
        @endif
        <div class="col-md-3">
            <a class="btn btn-success m-2" href="{{route('products.create')}}">Add a Product</a>
            <i class="fa fa-folder-open" ></i>
            <a href=""></a>
        </div>
        <div class="col-md-3">
           
            <a class="btn btn-success m-2" href="{{route('all_products')}}">View Products</a>
            <a href=""></a>
        </div>
    </div>
</div>
    
@endsection
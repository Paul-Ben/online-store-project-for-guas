@extends('dashboard')
@section('content')
    

<div class="row">
    
        <div class="card bg-success rounded p-3 m-1 col-md-3">
            <h1 style="text-align: center; color:white ">
                <a href="{{route('all_products')}}">{{$products->count()}}</a>
            </h1>
            <h2 style="text-align: center">
              Products available. 
            </h2>
        </div>
   
    <div class="card bg-success rounded p-3 m-1 col-md-3">
        <h1 style="text-align: center; color:white ">
            <a href="{{route('all_products')}}"> {{$categories->count()}}</a>
        </h1>
        <h2 style="text-align: center">
           Categories
        </h2>
    </div>
    <div class="card bg-success rounded p-3 m-1 col-md-3">
        <h1 style="text-align: center; color:white ">
            <a href="{{route('orders')}}"> {{$orders->count()}}</a>
        </h1>
        <h2 style="text-align: center">
           Orders
        </h2>
    </div>
</div>
@endsection
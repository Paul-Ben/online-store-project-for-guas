@extends('dashboard')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Alven International School SMS</h2>
            </div> --}}
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add a Product</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>S.No</th> --}}
                <th>Product</th>
                <th>Name</th>
                <th>Product Id</th>
                <th>Category</th>
                <th>Availability</th>
                <th>Price (NGN)</th>
                <th>Featured</th>
                <th>On Sale</th>
                <th>Recommended</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    
                    {{-- <td>{{ $fee->id }}</td> --}}
                    <td><img src="{{ asset($product->product_image) }}" alt="" width="80%" height="80%"></td>
                    <td>{{ $product->product_name}}</td>
                    <td>{{ $product->product_id}}</td>
                    <td>{{ $product->product_category}}</td>
                    <td>{{ $product->product_stock}}</td>
                    <td>{{ $product->product_price}}</td>
                    <td>{{ $product->featured_product}}</td>
                    <td>{{ $product->on_sale}}</td>
                    <td>{{ $product->recommended_product}}</td>
                   
                   
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
</div>

    
@endsection
@extends('dashboard')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Product</h2>
            </div>
            <div class="pull-right p-3">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
                    @error('product_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product ID:</strong>
                    <input type="text" name="product_id" class="form-control" placeholder="Product Id" value="{{'GUAS_'.rand(000001,1000000)}}" required>
                    @error('product_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Category:</strong>
                    <select class="form-control" name="product_category" aria-label="Default select example" required>
                        <option selected>Add a Category</option>
                       @foreach ($categories as $category)
                       <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                       @endforeach
                        </select>
                    @error('product_category')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Price:</strong>
                    <input type="text" name="product_price" class="form-control" placeholder="Product price" required>
                    @error('product_price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Add to Featured Products:</strong>
                    <select class="form-control" name="featured_product" aria-label="Default select example" required>
                        <option selected>Add to Featured Products</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>
                    @error('featured_product')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Add to Recommended :</strong>
                    <select class="form-control" name="recommended_product" aria-label="Default select example">
                        <option selected>Add to Recommended Products</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>
                    @error('recommended_product')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Add to Products on Sale:</strong>
                    <select class="form-control" name="on_sale" aria-label="Default select example">
                        <option selected>Add to Products on Sale</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>
                    @error('on_sale')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Sale Price:</strong>
                    <input type="text" name="sale_price" class="form-control" placeholder="Sale Price" required>
                    @error('sale_price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Product Image</label>
                <input type="file" class="form-control" id="exampleFormControlFile1" name="product_image">
                
              </div>
            <div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
        </div>
    </form>
</div>
   
@endsection
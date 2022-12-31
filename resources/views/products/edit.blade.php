@extends('dashboard')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Edit Product</h2>
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
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{$product->product_name}}" required >
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
                    <input type="text" name="product_id" class="form-control" placeholder="Product Id" value="{{$product->product_id}}" required>
                    @error('product_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Category:</strong>
                    <input type="text" name="product_category" class="form-control" placeholder="Product Category" value="{{$product->product_category}}" required>
                    @error('product_category')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Price:</strong>
                    <input type="text" name="product_price" class="form-control" placeholder="Product price" value="{{$product->product_price}}" required>
                    @error('product_price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Quantity in Stock:</strong>
                    <input type="text" name="stock" class="form-control" value="{{$product->stock}}" placeholder="Product quantity" required pattern="[0-9]{1,}">
                    @error('stock')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Availability:</strong>
                    <select class="form-control" name="product_stock" aria-label="Default select example" required>
                        <option value="{{$product->product_stock}}" selected>{{$product->product_stock}}</option>
                        <option value="In Stock">Available in Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                        </select>
                    @error('product_stock')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Add to Featured Products:</strong>
                    <select class="form-control" name="featured_product" aria-label="Default select example"  required>
                        <option value="{{$product->featured_product}}" selected>{{$product->featured_product}}</option>
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
                    <select class="form-control" name="recommended_product" aria-label="Default select example" required>
                        <option value="{{$product->recommended_product}}" selected>{{$product->recommended_product}}</option>
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
                    <select class="form-control" name="on_sale" aria-label="Default select example"  required>
                        <option value="{{$product->on_sale}}" selected>{{$product->on_sale}}</option>
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
                    <input type="text" name="sale_price" class="form-control" value="{{$product->sale_price}}" placeholder="Sale Price" pattern="[0-9]" required>
                    @error('sale_price')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Product Description:</strong>
                    <textarea name="description" class="from-control" id="" cols="35" rows="2">{{$product->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Product Image</label>
                    <input type="file" class="form-control" id="exampleFormControlFile1" value="{{$product->product_image}}" name="product_image">
                    
                  </div>
                </div>
           
            <div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
        </div>
    </form>
</div>
   
@endsection
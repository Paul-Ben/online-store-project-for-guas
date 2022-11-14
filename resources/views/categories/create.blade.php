@extends('dashboard')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Category</h2>
            </div>
            <div class="pull-right p-3">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                    @error('category_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Category ID:</strong>
                    <input type="text" name="category_id" class="form-control" placeholder="Category Id" value="{{'GUAS_'.rand(000001,1000000)}}" required>
                    @error('category_id')
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
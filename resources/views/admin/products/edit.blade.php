@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit product</div>
    <div class="card-body">
    <form action="{{route('product.update',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
            <input type="text" name="price" value="{{$product->price}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="descriptino">Description</label>
            <textarea name="descriptino" class="form-control" cols="5" rows="5" >{{$product->descriptino}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Featured Image</label>
            <input type="file" name="image" class="form-control-file" value="{{$product->image}}">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
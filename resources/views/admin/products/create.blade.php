@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">create new products</div>
    <div class="card-body">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Featured Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="descriptino">Description</label>
                <textarea  name="descriptino" id="article" class="form-control"  cols="5" rows="5" ></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
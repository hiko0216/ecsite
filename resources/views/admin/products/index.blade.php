@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        All products
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                            <tr>
                                <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" width="90px" height="50px"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td> 
                                <td><a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td><a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger btn-sm">delete</a></td>
                            </tr>
                    @endforeach
                @else 
                        <tr>
                            <th colspan="2" class="text-center">No published posts</th>
                        </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
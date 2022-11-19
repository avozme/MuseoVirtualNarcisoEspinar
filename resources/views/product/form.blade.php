
@extends("layouts.master")

@section("title", "Modificación de productos")

@section("header", "Modificación de productos")

@section("content")
    @isset($product)
        <form  action="{{ route('product.update', ['product' => $product->id]) }}" method="POST">
        @method("PUT")
    @else
    <form action="{{ route('product.store') }}" method="POST">
    @endisset
        @csrf
        <div class="container w-50">
            Nombre del producto:<input class="form-control" type="text" name="name" value="{{$product->name ?? '' }}"><br>
            Descripción:<input class="form-control" type="text" name="description" value="{{$product->description ?? '' }}"><br>
            Precio:<input class="form-control" type="text" name="price" value="{{$product->price ?? '' }}"><br>
            <input class="btn btn-dark center" type="submit">    
        </div>
    </form>
@endsection
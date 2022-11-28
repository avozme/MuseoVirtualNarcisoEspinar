
@extends("layouts.master")

@section("title", "Modificación de productos")

@section("header", "Modificación de productos")

@section("content")
    @isset($producto)
        <form  action="{{ route('producto.update', ['producto' => $producto->id]) }}" method="POST">
        @method("PUT")
    @else
    <form action="{{ route('producto.store') }}" method="POST">
    @endisset
        @csrf
        <div class="container-fluid">
            Nombre del producto:<input class="form-control" type="text" name="name" value="{{$producto->name ?? '' }}"><br>
            Descripción:<input class="form-control" type="text" name="description" value="{{$producto->description ?? '' }}"><br>
            Dimensiones:<input class="form-control" type="text" name="dimensions" value="{{$producto->dimensions ?? '' }}"><br>
            Colección:<input class="form-control" type="text" name="collection" value="{{$producto->collection ?? '' }}"><br>
            Técnica:<input class="form-control" type="text" name="technique" value="{{$producto->technique ?? '' }}"><br>
            <input class="btn btn-dark center" type="submit" value="Enviar">    
        </div>
    </form>
@endsection

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
        <div class="container w-50">
            Nombre del producto:<input class="form-control" type="text" name="nombre" value="{{$producto->nombre ?? '' }}"><br>
            Descripción:<input class="form-control" type="text" name="descripcion" value="{{$producto->descripcion ?? '' }}"><br>
            Dimensiones:<input class="form-control" type="text" name="dimensiones" value="{{$producto->dimensiones ?? '' }}"><br>
            Colección:<input class="form-control" type="text" name="coleccion" value="{{$producto->coleccion ?? '' }}"><br>
            Técnica:<input class="form-control" type="text" name="tecnica" value="{{$producto->tecnica ?? '' }}"><br>
            <input class="btn btn-dark center" type="submit">    
        </div>
    </form>
@endsection
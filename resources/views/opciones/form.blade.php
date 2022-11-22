
@extends("layouts.master")

@section("title", "Inserción de opciones")

@section("header", "Inserción de opciones")

@section("content")
    @isset($opciones)
        <form action="{{ route('opciones.update', ['opcion' => $opcion->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('opciones.store') }}" method="POST">
    @endisset
        @csrf
        Valor: <input type="text" name="valor" value="{{$opcion->valor ?? '' }}"><br>
        Clave: <input type="text" name="clave" value="{{$opcion->clave ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
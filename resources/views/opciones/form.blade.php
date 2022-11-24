
@extends("layouts.master")

@section("title", "Inserción de opciones")

@section("header", "Inserción de opciones")

@section("content")
    @isset($opcion)
        <form action="{{ route('opciones.update', ['opcione' => $opcion->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('opciones.store') }}" method="POST">
    @endisset
        @csrf
        Valor: <input type="text" name="value" value="{{$opcion->value ?? '' }}"><br>
        Clave: <input type="text" name="key" value="{{$opcion->key ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
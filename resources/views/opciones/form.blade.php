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
        <div class="container w-50">
        Valor: <input type="text" name="value" value="{{$opcion->value ?? '' }}"><br>
        Clave: <input type="text" name="key" value="{{$opcion->key ?? '' }}"><br>
        <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
        </form>
@endsection
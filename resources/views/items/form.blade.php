
@extends("layouts.master")

@section("title", "Inserción de etiquetas")

@section("header", "Inserción de etiquetas")

@section("content")
    @isset($etiqueta)
        <form action="{{ route('etiquetas.update', ['etiqueta' => $etiqueta->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('etiquetas.store') }}" method="POST">
    @endisset
        @csrf
        Nombre de la etiqueta:<input type="text" name="name" value="{{$etiqueta->name ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
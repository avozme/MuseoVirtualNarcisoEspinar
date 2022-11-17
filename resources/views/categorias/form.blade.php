
@extends("layouts.master")

@section("title", "Inserción de categorias")

@section("header", "Inserción de categorias")

@section("content")
    @isset($categoria)
        <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('categorias.store') }}" method="POST">
    @endisset
        @csrf
        Nombre de la categoria:<input type="text" name="name" value="{{$categoria->name ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
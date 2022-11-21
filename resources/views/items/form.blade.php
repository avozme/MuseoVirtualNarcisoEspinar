
@extends("layouts.master")

@section("title", "Inserción de items")

@section("header", "Inserción de items")

@section("content")
    @isset($etiqueta)
        <form action="{{ route('items.update', ['item' => $item->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('items.store') }}" method="POST">
    @endisset
        @csrf
        Nombre del item:<input type="text" name="name" value="{{$item->name ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
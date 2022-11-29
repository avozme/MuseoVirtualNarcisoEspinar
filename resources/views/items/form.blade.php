@extends("layouts.master")

@section("title", "Inserción de items")

@section("header", "Inserción de items")

@section("content")
    @isset($item)
        <form action="{{ route('items.update', ['item' => $item->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('items.store') }}" method="POST">
    @endisset
        @csrf
        <div class="container-fluid">
        Nombre del item:<input class="form-control" type="text" name="name" value="{{$item->name ?? '' }}"><br>
        <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
        </form>
@endsection
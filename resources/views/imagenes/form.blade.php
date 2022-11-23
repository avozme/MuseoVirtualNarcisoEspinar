@extends("layouts.master")

@section("title", "Inserción de imágenes")

@section("header", "Inserción de imágenes")

@section("content")
    @isset($imagene)
        <form action="{{ route('imagenes.update', ['imagene' => $imagene->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('imagenes.store') }}" method="POST">
    @endisset
        @csrf
        Nombre imagen:<input type="text" name="name" value="{{$imagene->image ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
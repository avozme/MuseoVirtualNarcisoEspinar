@extends("layouts.master")

@section("title", "Inserción de imágenes")

@section("header", "Inserción de imágenes")

@section("content")
    @isset($imagen)
        <form action="{{ route('imagenes.update', ['imagen' => $imagen->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('imagenes.store') }}" method="POST">
    @endisset
        @csrf
        Nombre de la imagen:<input type="text" name="name" value="{{$imagen->name ?? '' }}"><br>
        <!-- Aquí va la subida de las imagenes*/ -->
        <input type="submit">
        </form>
@endsection
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
        <div class="container-fluid">
        Nombre imagen:<input class="form-control" type="text" name="image" value="{{$imagene->image ?? '' }}"><br>
        <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
        </form>
@endsection
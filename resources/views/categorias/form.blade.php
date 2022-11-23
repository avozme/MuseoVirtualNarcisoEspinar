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
        <div class="container w-50">
            Nombre de la categoria:<input class="form-control" type="text" name="name" value="{{$categoria->name ?? '' }}"><br>
            <input class="btn btn-dark center" type="submit">    
        </div>
        </form>
@endsection
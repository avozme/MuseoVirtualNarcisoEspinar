@extends("layouts.master")

@section("title", "Administración de categorias")

@section("header", "Administración de categorias")

@section("content")
   
<table class="table table-hover">
    @foreach ($categoriasList as $categoria)
        <tr>
            <td>{{$categoria->name}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('categorias.edit', $categoria->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('categorias.destroy', $categoria->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
    @endforeach
    </table>
    <a class ="btn btn-outline-success" href="{{ route('categorias.create') }}">Nuevo</a>
@endsection
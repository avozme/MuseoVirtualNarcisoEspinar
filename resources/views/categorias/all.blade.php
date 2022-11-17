@extends("layouts.master")

@section("title", "Administración de categorias")

@section("header", "Administración de categorias")

@section("content")
    <a href="{{ route('categorias.create') }}">Nuevo</a>
    <table border='1'>
    @foreach ($categoriasList as $categorias)
        <tr>
            <td>{{$categorias->name}}</td>
            <td>
                <a href="{{route('categorias.edit', $categorias->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('categorias.destroy', $categorias->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
@endsection
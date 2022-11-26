@extends("layouts.master")

@section("title", "Administración de usuarios")

@section("header", "Administración de usuarios")

@section("content")

    <table class="table table-hover">
    @foreach ($usuariosList as $usuario)
        <tr>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->user}}</td>
            <td>{{$usuario->password}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('usuarios.edit', $usuario->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>

    @endforeach
    </table>
    <a class ="btn btn-outline-success" href="{{ route('usuarios.create') }}">Nuevo</a>
@endsection
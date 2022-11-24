@extends("layouts.master")

@section("title", "Administración de usuarios")

@section("header", "Administración de usuarios")

@section("content")
    <a href="{{ route('usuarios.create') }}">Nuevo</a>
    <table border='1'>
    @foreach ($usuariosList as $usuario)
        <tr>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->user}}</td>
            <td>{{$usuario->password}}</td>
            <td>
                <a href="{{route('usuarios.edit', $usuario->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
@endsection
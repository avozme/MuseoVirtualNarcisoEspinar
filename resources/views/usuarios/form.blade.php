@extends("layouts.master")

@section("title", "Inserción de usuarios")

@section("header", "Inserción de usuarios")

@section("content")
    @isset($usuario)
        <form action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}" method="POST">
        @method("PUT")
    @else
        <form action="{{ route('usuarios.store') }}" method="POST">
    @endisset
        @csrf
        Nombre :<input type="text" name="name" value="{{$usuario->name ?? '' }}"><br>
        Usuario:<input type="text" name="user" value="{{$usuario->user ?? '' }}"><br>
        Contraseña:<input type="text" name="password" value="{{$usuario->password ?? '' }}"><br>
        <input type="submit">
        </form>
@endsection
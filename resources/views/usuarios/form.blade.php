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
        <div class="container-fluid">
        Nombre :<input class="form-control" type="text" name="name" value="{{$usuario->name ?? '' }}"><br>
        Email:<input class="form-control" type="email" name="user" value="{{$usuario->email ?? '' }}"><br>
        Contraseña:<input class="form-control" type="text" name="password" value="{{$usuario->password ?? '' }}"><br>
        <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
        </form>
@endsection
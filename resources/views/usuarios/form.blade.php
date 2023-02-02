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
            Nombre :<input class="form-control mb-3" type="text" name="name" value="{{$usuario->name ?? '' }}">
            Correo:<input class="form-control mb-3" type="email" name="email" value="{{$usuario->email ?? '' }}">
            <input type="hidden" name="password" value="{{$usuario->password ?? '' }}">
            Tipo:
            <select class="form-select mb-3" name='type' >
                <option @if ($usuario->type == 'SuperAdmin')  selected @endif value='SuperAdmin'>Super Admin</option>
                <option @if ($usuario->type == 'Admin') selected @endif value='Admin'>Admin</option>
                <option @if ($usuario->type == 'Basico') selected @endif value='Basico'>Basico</option>
            </select>


            <input class="btn btn-dark center" type="submit" value="Enviar">
        </div>
    </form>
    @endsection
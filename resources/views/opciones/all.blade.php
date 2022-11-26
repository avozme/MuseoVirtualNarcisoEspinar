@extends("layouts.master")

@section("title", "Administración de opciones")

@section("header", "Administración de opciones")

@section("content")
   
<table class="table table-hover">
    @foreach ($opcionesList as $opcion)
        <tr>
            <td>{{$opcion->value}}</td>
            <td>{{$opcion->key}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('opciones.edit', $opcion->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('opciones.destroy', $opcion->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
            
    @endforeach
    </table>
    <a class ="btn btn-outline-success" href="{{ route('opciones.create') }}">Nuevo</a>
@endsection
@extends("layouts.master")

@section("title", "Administración de opciones")

@section("header", "Administración de opciones")

@section("content")
   
    <table border='1'>
    @foreach ($opcionesList as $opcion)
        <tr>
            <td>{{$opcion->valor}}</td>
            <td>{{$opcion->clave}}</td>
            <td>
                <a href="{{route('opciones.edit', $opcion->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('opciones.destroy', $opcion->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
            
        <br>
    
    @endforeach
    </table>
    <a href="{{ route('opciones.create') }}">Nuevo</a>
@endsection
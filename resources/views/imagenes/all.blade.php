@extends("layouts.master")

@section("title", "Administración de imágenes")

@section("header", "Administración de imágenes")

@section("content")
    
    <table border='1'>
    @foreach ($imagenesList as $imagene)
        <tr>
            <td>{{$imagene->image}}</td>
            <td>
                <a href="{{route('imagenes.edit', $imagene->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('imagenes.destroy', $imagene->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
    <a href="{{ route('imagenes.create') }}">Nuevo</a>
@endsection
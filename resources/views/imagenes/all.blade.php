@extends("layouts.master")

@section("title", "Administración de imagenes")

@section("header", "Administración de imagenes")

@section("content")
    <a href="{{ route('imagenes.create') }}">Nuevo</a>
    <table border='1'>
    @foreach ($imagenesList as $imagen)
        <tr>
            <td>{{$imagen->image}}</td>
            <td>
                <a href="{{route('imagenes.edit', $imagen->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('imagenes.destroy', $imagen->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
@endsection
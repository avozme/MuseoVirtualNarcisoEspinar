@extends("layouts.master")

@section("title", "Administración de etiquetas")

@section("header", "Administración de etiquetas")

@section("content")
    <a href="{{ route('etiquetas.create') }}">Nuevo</a>
    <table border='1'>
    @foreach ($etiquetasList as $etiquetas)
        <tr>
            <td>{{$etiquetas->name}}</td>
            <td>
                <a href="{{route('etiquetas.edit', $etiqueta->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('etiquetas.destroy', $etiqueta->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
@endsection
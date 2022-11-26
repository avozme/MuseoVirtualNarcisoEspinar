@extends("layouts.master")

@section("title", "Administración de imágenes")

@section("header", "Administración de imágenes")

@section("content")
    
<table class="table table-hover">
    @foreach ($imagenesList as $imagene)
        <tr>
            <td>{{$imagene->image}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('imagenes.edit', $imagene->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('imagenes.destroy', $imagene->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger"  type="submit" value="Borrar">
                </form>
            </td>

    @endforeach
    </table>
    <a class ="btn btn-outline-success" href="{{ route('imagenes.create') }}">Nuevo</a>
@endsection
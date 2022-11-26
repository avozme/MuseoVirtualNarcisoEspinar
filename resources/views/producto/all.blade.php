@extends("layouts.master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("content")
<table class="table table-hover">
    @foreach ($productoList as $producto)
        <tr>
            <td>{{$producto->name}}</td>
            <td>{{$producto->description}}</td>
            <td>{{$producto->dimensions}}</td>
            <td>{{$producto->collection}}</td>
            <td>{{$producto->technique}}</td>

            <td>
                <a class="btn btn-outline-secondary" href="{{route('producto.edit', $producto->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('producto.destroy', $producto->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
    @endforeach
    </table>
    <a class="btn btn-outline-success" href="{{ route('producto.create') }}">Nuevo</a>
@endsection
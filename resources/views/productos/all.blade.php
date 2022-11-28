@extends("layouts.master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("content")
<table class="table table-hover">
    @foreach ($productosList as $producto)
        <tr>
            <td>{{$producto->name}}</td>
            <td>{{$producto->description}}</td>
            <td>{{$producto->dimensions}}</td>
            <td>{{$producto->collection}}</td>
            <td>{{$producto->technique}}</td>

            <td>
                <a class="btn btn-outline-secondary" href="{{route('productos.edit', $producto->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('productos.destroy', $producto->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
    @endforeach
    </table>
    <a class="btn btn-outline-success"  href="{{ route('productos.create') }}">Nuevo</a>
@endsection
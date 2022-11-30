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
            <td>{{$producto->categoria->name}}</td>


            <td>
                <a class="btn btn-outline-secondary" href="{{route('productos.edit', $producto->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('productos.destroy', $producto->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>
    @endforeach
    </table>
    <a class="btn btn-outline-success"  href="{{ route('productos.create') }}">Nuevo</a>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>

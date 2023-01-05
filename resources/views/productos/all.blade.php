@extends("layouts.master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("content")
<table class="table table-hover">
<tr>
      <th scope="col">Nombre
      </th>
      <th scope="col">Descripción
      </th> 
      <th scope="col">Dimensiones</th>
      <th scope="col">Colección
      </th> 
      <th scope="col">Técnica</th>
      <th scope="col">Imagen</th>    
      <th scope="col">Categoría
      </th>
      <th scope="col"></th>  
      <th scope="col"></th> 
      <th scope="col"></th>  
      <th scope="col"></th> 
    </tr>
    @foreach ($productosList as $producto)
        <tr>
            <td>{{$producto->name}}</td>
            <td>{{$producto->description}}</td>
            <td>{{$producto->dimensions}}</td>
            <td>{{$producto->collection}}</td>
            <td>{{$producto->technique}}</td>
            <td><img src='{{asset("storage/$producto->image")}}' width="70"></td>
            <td>{{$producto->categoria->name}}</td>


            <td>
                <a class="btn btn-outline-secondary" href="{{route('productos.edit', $producto->id)}}">Modificar</a></td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('productos.show', $producto->id)}}">Ver más</a></td>
            <td>
                <form action = "{{route('productos.destroy', $producto->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>
    @endforeach
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
    <a class="btn btn-outline-success"  href="{{ route('productos.create') }}">Nuevo</a>
    </div>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>

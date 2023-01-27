@extends("layouts.master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("content")
<table class="table table-hover">
    <tr>
        <th scope="col">Nombre
        </th>
        </th>
        <th scope="col">Foto Principal
        </th>
        <th scope="col">Categoría
        </th>

        <!-- Buscador -->
        <th scope="col" colspan="3">
        @section('buscador')
            <form class="ms-auto pt-3   " action="{{route('buscadorBack')}}" method="POST">
                <div class="d-flex ">
                
                    @csrf
                    <div class="input-group">
                    <select class="form-select" name='idCategoria'>
                        <option value=''>Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                        <option value='{{$categoria->id}}' @if(isset($idCategoria) && $idCategoria == $categoria->id) selected @endif>{{$categoria->name}}</option>
                
                        </option>
                        @endforeach
                    </select>
                            <input type="text" class="form-control" id="texto" name="textoBusqueda"
                                placeholder="Buscar objetos" value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                            <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        @endsection
            <!-- Fin Buscador -->
        </th>
    </tr>
    @foreach ($productosList as $producto)
    <tr>
        <td>{{$producto->name}}</td>
        <td><img src='{{asset("storage/$producto->id/$producto->image")}}' width="120"></td>
        <td>{{$producto->categoria->name}}</td>
        <td>
            <a class="btn btn-outline-secondary" href="{{route('productos.edit', $producto->id)}}"><i class="fa-solid fa-pen"></i></a>
        </td>
        <td>
            <a class="btn btn-outline-secondary" href="{{route('productos.show', $producto->id)}}"><i class="fa-solid fa-eye"></i></a>
        </td>
        <td>
            <form action="{{route('productos.destroy', $producto->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-outline-danger" type="button" onclick='destroy(event)'><i class="fa-solid fa-trash-can"></i></button>
            </form>
        </td>
        @endforeach
</table>
<div class="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
    <a class="btn btn-outline-success" href="{{ route('productos.create') }}">Nuevo</a>
</div>
@endsection

<script type="text/javascript">
function destroy(e) {
    if (!confirm('¿Seguro que desea borrar este recurso?')) {
        e.preventDefault();
    }

}
</script>
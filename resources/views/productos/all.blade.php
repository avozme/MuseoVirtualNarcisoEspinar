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
            <div class="d-flex w-100 pt-3">
                <div class="input-group">
                    <form action="{{route('buscadorBack')}}" action="POST">
                        <input type="text" class="form-control" id="texto" name="textoBusqueda"
                            placeholder="Ingrese nombre" value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                        <input type="submit" value="Buscar">
                        <!-- <div class="input-group-append"><span class="input-group-text">Buscar</span></div> -->
                    </form>
                </div>
            </div>
            <!-- Fin Buscador -->
        </th>
    </tr>
    @foreach ($productosList as $producto)
    <tr>
        <td>{{$producto->name}}</td>
        <td><img src='{{asset("storage/$producto->id/$producto->image")}}' width="120"></td>
        <td>{{$producto->categoria->name}}</td>


        <td>
            <a class="btn btn-outline-secondary" href="{{route('productos.edit', $producto->id)}}">Modificar</a>
        </td>
        <td>
            <a class="btn btn-outline-secondary" href="{{route('productos.show', $producto->id)}}">Ver más</a>
        </td>
        <td>
            <form action="{{route('productos.destroy', $producto->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
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
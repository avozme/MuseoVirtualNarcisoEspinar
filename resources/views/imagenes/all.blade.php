@extends("layouts.master")

@section("title", "Administración de imágenes")

@section("header", "Administración de imágenes")

@section("content")
    
<table class="table table-hover">
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col"></th> 
      <th scope="col"></th> 
    </tr>
    @foreach ($imagenesList as $imagene)
        <tr>
            <td>{{$imagene->image}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('imagenes.edit', $imagene->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('imagenes.destroy', $imagene->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger"  type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>

    @endforeach
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
      <a class ="btn btn-outline-success" href="{{ route('imagenes.create') }}">Nuevo</a>
    </div>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
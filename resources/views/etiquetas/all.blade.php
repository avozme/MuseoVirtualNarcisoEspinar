@extends("layouts.master")

@section("title", "Administración de etiquetas")

@section("header", "Administración de etiquetas")

@section("content")
    
    <table class="table table-hover">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col"></th> 
      <th scope="col"></th> 
    </tr>
    @foreach ($etiquetasList as $etiqueta)
        <tr>
            <td>{{$etiqueta->name}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('etiquetas.edit', $etiqueta->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('etiquetas.destroy', $etiqueta->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>

    @endforeach
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
      <a class ="btn btn-outline-success" href="{{ route('etiquetas.create') }}">Nuevo</a>
    </div>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
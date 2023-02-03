@extends("layouts.master")

@section("title", "Administración de opciones")

@section("header", "Administración de opciones")

@section("content")
   
<table class="table table-hover">
    <tr>
      <th scope="col">Tipo</th>
      <th scope="col"></th> 
      <th scope="col"></th>
      <th scope="col"></th> 
 
    </tr>
    @foreach ($opcionesList as $opcion)
        <tr>
            <td>{{$opcion->value}}</td>
            <td>{{$opcion->key}}</td>
      
                
            <td>
                <form action = "{{route('opciones.destroy', $opcion->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-outline-danger" type="submit" onclick='destroy(event)'><i class="fa-solid fa-trash-can"></i></button>
                </form>
                
            </td>
            <td><a class="btn btn-outline-secondary" href="{{route('opciones.edit', $opcion->id)}}"><i class="fa-solid fa-pen"></i></a></td></td>
            
    @endforeach
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
      <a class ="btn btn-outline-success" href="{{ route('opciones.create') }}">Nuevo</a>
    </div>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
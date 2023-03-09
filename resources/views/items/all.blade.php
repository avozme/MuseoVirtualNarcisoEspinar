@extends("layouts.master")

@section("title", "Administración de items")

@section("header", "Administración de items")


@section("content")
    
    <table class="table table-hover">
    <tr>
      <th scope="col">Campo</th>
      <th scope="col">Colección</th>  
      <th scope="col"></th> 
      <th scope="col"></th> 

        <!-- Buscador -->
        <th scope="col" colspan="3">
        @section('buscador')
            <form class="ms-auto pt-3" action="{{route('buscadorBack')}}" method="GET">
                <div class="d-flex ">
                
                    <!-- @csrf -->
                    <div class="input-group p-3">
                    <select class="form-select" name='idCategoria' id='idCategoria' onChange='filtrarPorCategoria()'>
                        <option value='-1'>Selecciona una colección</option>
                        @foreach ($categorias as $categoria)
                        <option value='{{$categoria->id}}' @if(isset($idCategoria) && $idCategoria == $categoria->id) selected @endif>{{$categoria->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </form>
        @endsection
        </th>
        <!-- Fin Buscador -->
        
    </tr>
    @foreach ($itemsList as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->categoria->name}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('items.edit', $item->id)}}"><i class="fa-solid fa-pen"></i></a></td>
            <td>
                <form action = "{{route('items.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-outline-danger" type="submit" onclick='destroy(event)'><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </td>
          </tr>

    @endforeach
    </table>
    <div class ="d-grid gap-4 d-md-flex justify-content-md-start ms-2">
      <a class ="btn btn-outline-success" href="{{ route('items.create') }}">Nuevo</a>
    </div>
@endsection

<script type = "text/javascript">
  function destroy(e){
      if (!confirm('¿Seguro que desea borrar este recurso?')){
      e.preventDefault();
    }
  }

  function filtrarPorCategoria() {
      var idCategoria = document.getElementById('idCategoria').value;
      window.location.href = "{{url('items/category')}}" + "/" + idCategoria;
  }
  </script>
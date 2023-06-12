@extends("layouts.master")

@section("title", "Administración de categorias")

@section("header", "Administración de categorias")

@section("content")

<table class="table table-hover">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col"></th> 
      <th scope="col">
        <div class ="align-left">
          <a class ="btn btn-outline-success" href="{{ route('categorias.create') }}">Nuevo</a>
        </div>  
      </th> 
    </tr>
    @foreach ($categoriasList as $categoria)
        <tr>
            <td>{{$categoria->name}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('categorias.edit', $categoria->id)}}"><i class="fa-solid fa-pen"></i></a></td>
            <td>
                <form action = "{{route('categorias.destroy', $categoria->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-outline-danger" type="submit" onclick='destroy(event)'><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </td>
    @endforeach
    </table>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso? ->IMPORTANTE<- Se borraran todos los datos que contenga esta categoria.')){
    e.preventDefault();
    }

  }
  </script>
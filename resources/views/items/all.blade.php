@extends("layouts.master")

@section("title", "Administración de items")

@section("header", "Administración de items")

@section("content")
    
    <table class="table table-hover">
    <tr>
      <th scope="col">Item</th>
      <th scope="col">Categoria</th>  
      <th scope="col"></th> 
      <th scope="col"></th> 
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
  </script>
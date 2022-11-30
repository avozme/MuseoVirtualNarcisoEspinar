@extends("layouts.master")

@section("title", "Administración de items")

@section("header", "Administración de items")

@section("content")
    
    <table class="table table-hover">
    @foreach ($itemsList as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <a class="btn btn-outline-secondary" href="{{route('items.edit', $item->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('items.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>

    @endforeach
    </table>
    <a class ="btn btn-outline-success" href="{{ route('items.create') }}">Nuevo</a>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
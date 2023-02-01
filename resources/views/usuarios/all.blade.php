@extends("layouts.master")

@section("title", "Administración de usuarios")

@section("header", "Administración de usuarios")

@section("content")

    <table class="table table-hover">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th> 
      <th scope="col">Contraseña</th>
      <th scope="col"></th>  
      <th scope="col"></th> 
    </tr>
    @foreach ($usuariosList as $usuario)
        <tr>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->password}}</td>
            <td>
            <td>
                <form action = "{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar" onclick='destroy(event)'>
                </form>
            </td>
    @endforeach
    </table>
@endsection

<script type = "text/javascript">
  function destroy(e){
    if (!confirm('¿Seguro que desea borrar este recurso?')){
    e.preventDefault();
    }

  }
  </script>
@extends("layouts.master")

@section("title", "Administración de items")

@section("header", "Administración de items")

@section("content")
    <a href="{{ route('items.create') }}">Nuevo</a>
    <table border='1'>
    @foreach ($itemsList as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <a href="{{route('items.edit', $item->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('items.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
@endsection
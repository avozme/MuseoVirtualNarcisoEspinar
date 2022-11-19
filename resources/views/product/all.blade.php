@extends("layouts.master")

@section("title", "Administración de productos")

@section("header", "Administración de productos")

@section("content")
    <table class="table" >
    @foreach ($productList as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a class="btn btn-outline-success" href="{{route('product.edit', $product->id)}}">Modificar</a></td>
            <td>
                <form action = "{{route('product.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="btn btn-outline-danger" type="submit" value="Borrar">
                </form>
            </td>
        <br>
    @endforeach
    </table>
    <a class="btn btn-outline-dark" href="{{ route('product.create') }}">Nuevo</a>
@endsection
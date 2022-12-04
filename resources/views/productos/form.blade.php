@extends("layouts.master")

@section("title", "Modificación de productos")

@section("header", "Modificación de productos")

@section("content")
    @isset($producto)
        <form  action="{{ route('productos.update', ['producto' => $producto->id]) }}" method="POST">
        @method("PUT")
    @else
    <form action="{{ route('productos.store') }}" method="POST" id="formulario">
    @endisset
        @csrf
        <div class="container-fluid">
            Nombre del producto:<input class="form-control" type="text" name="name" value="{{$producto->name ?? '' }}"><br>
            Descripción:<input class="form-control" type="text" name="description" value="{{$producto->description ?? '' }}"><br>
            Dimensiones:<input class="form-control" type="text" name="dimensions" value="{{$producto->dimensions ?? '' }}"><br>
            Colección:<input class="form-control" type="text" name="collection" value="{{$producto->collection ?? '' }}"><br>
            Técnica:<input class="form-control" type="text" name="technique" value="{{$producto->technique ?? '' }}"><br>
            Imagen:<input class="form-control" type="text" name="image" value="{{$producto->image ?? '' }}"><br>
            Categoria:<select class="form-select" type="text" name="categoria_id" id="categoria_id" onchange="actualizar_items()">

            @foreach ($categoriasList as $categoria) {
                <option value='{{$categoria->id}}'>{{$categoria->name}}</option>
            @endforeach

        </select>
            <input class="btn btn-dark center mt-3" type="submit" value="Enviar">    
        </div>
    </form>
@endsection



<script>
    function actualizar_items() {
        id_categoria = document.getElementById("categoria_id").value;

        //let lista_items = null;
        fetch("/categorias/get_items/" + id_categoria).then(data=> data.json()).then(json=> {        
                /*let lista_items = */
                console.log(json);
                json.forEach(item => {
                    formulario.append("<input class='form-control' type='text' name='"+item.name+"'>" );
                    console.log(item);
                });
            })
        }      
</script>
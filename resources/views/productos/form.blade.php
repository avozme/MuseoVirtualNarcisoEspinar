@extends("layouts.master")

@section("title", "Modificación de productos")

@section("header", "Modificación de productos")

@section("content")
@isset($producto)
<form action="{{ route('productos.update', ['producto' => $producto->id]) }}" method="POST" id="formulario"
    enctype="multipart/form-data">
    <div class="container-fluid" id="miFormulario">
        <!-- @foreach ($producto->items as $item) 
                {{$item->name}} <input class="form-control" type="text" value='{{$item->pivot->value}}'><br>
                @endforeach -->
    </div>
    @method("PUT")
    @else
    <form action="{{ route('productos.store') }}" method="POST" id="formulario" enctype="multipart/form-data">
        @endisset
        @csrf
        <div class="container-fluid" id="miFormulario">
            Categoria:<select class="form-select" type="text" name="categoria_id" id="categoria_id"
                onchange="actualizar_items()">
                <option value=''>Selecciona</option>
                @foreach ($categorias as $categoria) {
                <option value='{{$categoria->id}}' @if(isset($producto->categoria) && $producto->categoria->id ==
                    $categoria->id) selected @endif>{{$categoria->name}}</option>}
                @endforeach
            </select> <br>
            Nombre :<input required class="form-control" type="text" name="name" value="{{$producto->name ?? '' }}"
                id="categoria_id"><br>
            Foto principal:
            @if(isset($image))
            <div id="image">
                <img src="{{$image}}" width=150 onload="activar_btn()">
            </div> <br>
            @endif
            <input class="form-control" type="file" accept="image/*" name="image"
                value="{{$producto->image ?? '' }}"><br>

            <div id="image" class="row">
                @if (isset($producto))
                @foreach($producto->imagenes as $image)
                <div class="image-item d-flex justify-content-center align-items-center col-sm-2"
                    onclick="deleteItem(this)">
                    <img src="/storage/{{$producto->id}}/mini_{{$image->image}}" width="150">
                    <input value="{{$image->image}}" class="inputDelete" name="images[]" type="hidden">
                    <i class="fa-solid fa-trash fs-1 btnDelete"></i>
                </div>
                @endforeach
                @endif
                <div id="deleteImages">
                </div>
            </div> <br>

            Fotos Adicionales:
            <input class="form-control" type="file" accept="image/*" name="images[]" multiple value="">


            <div id="listItems">
                @if(isset($items))
                @foreach($items as $key => $item)
                <label class="mt-4">{{$item->name}}</label>
                <input class="form-control" type="text" name="items[{{$key}}][value]"
                    value="{{$item->itemsProducto->value ?? '' }}">
                <input type="hidden" name="items[{{$key}}][id]" value="{{$item->id ?? '' }}">
                @endforeach
                @endif
            </div>

            <input class="btn btn-dark center mt-3" type="submit" value="Enviar" id="submitButton" disabled>
        </div>
    </form>
    @endsection

    <script>
    function actualizar_items() {
        id_categoria = document.getElementById("categoria_id").value;
        var listItems = document.getElementById("listItems");
        listItems.innerHTML = "";
        var cont = 0;
        fetch("/categorias/get_items/" + id_categoria).then(data => data.json()).then(json => {
            json.forEach(item => {
                var input = document.createElement("input");
                var hidden = document.createElement("input");
                var label = document.createElement("label");
                input.type = "text";
                hidden.type = "hidden";
                input.name = `items[${cont}][value]`;
                hidden.name = `items[${cont}][id]`;
                hidden.value = item.id;
                label.innerHTML = item.name;
                input.classList.add("form-control");
                label.classList.add("mt-4");
                listItems.appendChild(label);
                listItems.appendChild(hidden);
                listItems.appendChild(input);
                cont++;
            });
        })
        activar_btn();
    }
    
    function deleteItem(este) {
        let inputValue = este.querySelector('.inputDelete').value
        if (confirm(`¿Desea borrar el archivo ${inputValue}?`)) {
            document.getElementById('deleteImages').innerHTML +=
            `<input type="hidden" name="deleteImages[]" value="${inputValue}">`
            este.remove()
        }
    }
    
    function activar_btn(){       
        // Desactiva el botón de enviar hasta que se selecciona una categoría
        if (document.getElementById("categoria_id").value !== "") {
            document.getElementById("submitButton").disabled = false;
        } else {
            document.getElementById("submitButton").disabled = true;
        }
    }
    </script>
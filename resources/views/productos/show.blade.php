@extends("layouts.master")

@section("title", "vista de productos")

@section("header", "vista de productos")

@section("content")

<form id="formulario">
        <div class="container-fluid">
            Nombre del producto:<input class="form-control" disabled type="text" name="name" value="{{$producto->name ?? '' }}"><br>
            Dimensiones:<input class="form-control" type="text" disabled name="dimensions" value="{{$producto->dimensions ?? '' }}"><br>
            Categoria:<input class="form-control" type="text" disabled name="categoria_id" value="{{$producto->categoria->name}}" id="categoria_id"><br>

            @foreach ($producto->items as $item) 
            {{$item->name}} <input class="form-control" disabled type="text" value='{{$item->pivot->value}}'><br>
            @endforeach
            
        </select>  
        Imagen: <br> <img src='{{asset("storage/$producto->id/$producto->image")}}' width="150">
        @foreach($producto->imagenes as $image)
            <img src='{{asset("storage/$producto->id/$image->image")}}' width="150" >
        @endforeach
        </div>

    </form>

    @endsection


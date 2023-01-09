@extends("layouts.master")

@section("title", "vista de productos")

@section("header", "vista de productos")

@section("content")

<form id="formulario">
        <div class="container-fluid">
            Nombre del producto:<input class="form-control" disabled type="text" name="name" value="{{$producto->name ?? '' }}"><br>
            Descripción:<input class="form-control" type="text" disabled name="description" value="{{$producto->description ?? '' }}"><br>
            Dimensiones:<input class="form-control" type="text" disabled name="dimensions" value="{{$producto->dimensions ?? '' }}"><br>
            Colección:<input class="form-control" type="text" disabled name="collection" value="{{$producto->collection ?? '' }}"><br>
            Técnica:<input class="form-control" type="text" disabled name="technique" value="{{$producto->technique ?? '' }}"><br>
            Categoria:<input class="form-control" type="text" disabled name="categoria_id" value="{{$producto->categoria->name}}" id="categoria_id"><br>

            @foreach ($producto->items as $item) 
            {{$item->name}} <input class="form-control" disabled type="text" value='{{$item->pivot->value}}'><br>
            @endforeach
            
        </select>  
        Imagen: <br> <img src='{{asset("storage/$producto->image")}}' width="70">

        @foreach ($producto->imagenes as $image) 
            <img src='{{asset("storage/$image")}}' width="70"><br>
            @endforeach
        </div>
       
    </form>
    @endsection
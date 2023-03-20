@extends('layouts.front')
@section('content')
<div class="container" style="margin-top: 120px">
    <!-- Buscador General-->
    <div class="w-50 pb-5" id="buscador_general_front">
        <form action="{{route('buscadorFront')}}" method="GET">
            <div class="input-group" style="font-family: {{$opciones['tipografia3']}}">
                <input type="text" class="form-control" id="texto" name="textoBusqueda" placeholder="Busqueda general"
                    value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <!--Fin Buscador General-->

    <!-- Checkbox categorias -->
    <div class="buscador_por_campos pt-5">
        <form action="{{route('buscadorPorCampos')}}" method="POST" style="font-family: {{$opciones['tipografia3']}}">
            BÚSQUEDA POR CAMPOS: <br>
            @csrf
            @foreach ($categoriasList as $key => $categoria)
            <label class="form-check-label mb-3  mt-3"><input @if ($key==0) checked @endif class="form-check-input"
                    type="radio" id="categoria{{$key}}" name="categoria_id" onclick="showItems(this)"
                    value="{{$categoria->id}}"> {{$categoria->name}}</label> &nbsp
            @endforeach
            <!--Fin Checkbox categorias -->

            <!-- Fin Buscador -->
            <div class="d-flex" style="text-align:left">
                @foreach ($categoriasList as $key => $categoria)
                <div class="@if ($key != 0) d-none @endif items categoria{{$key}} ">
                    @foreach($categoria->items as $items)
                    <label class="col-md-4" style="margin-right:7%"> {{$items->name}} 
                        <input class="form-control" type="text" name="items[{{$items->id}}]">
                    </label>
                    @endforeach
                </div>
                @endforeach
            </div>
            <button class="mt-3 btn btn-dark" type="submit">Enviar búsqueda &nbsp;&nbsp;&nbsp;<i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

</div>

@endsection

<script>
function showItems(element) {
    document.querySelectorAll('.items').forEach((el) => {
        el.classList.add('d-none')
    })
    document.querySelector("." + element.id).classList.remove('d-none')

}
</script>
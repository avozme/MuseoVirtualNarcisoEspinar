@extends('layouts.front')
@section('content')
<div class="container" style="margin-top: 120px;">
    <!-- Buscador General-->
    <div class="p-1 searchParent w-50">
        <form action="{{route('buscadorFront')}}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" id="texto" name="textoBusqueda" placeholder="Busqueda general"
                    value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <!--Fin Buscador General-->

    <!-- Checkbox categorias -->
    <form action="{{route('buscadorPorCampos')}}" method="POST">
        @csrf
        @foreach ($categoriasList as $key => $categoria)
        <label class="form-check-label mb-3  mt-3"><input @if ($key==0) checked @endif class="form-check-input"
                type="radio" id="categoria{{$key}}" name="categoria_id" onclick="showItems(this)"
                value="{{$categoria->id}}"> {{$categoria->name}}</label> &nbsp
        @endforeach
        <!--Fin Checkbox categorias -->

        <!-- Fin Buscador -->
        <div class="d-flex" style="text-align:justify">
            @foreach ($categoriasList as $key => $categoria)
            <div class="@if ($key != 0) d-none @endif items categoria{{$key}} ">
                @foreach($categoria->items as $items)
                <label class="col-md-5"> {{$items->name}} <input class="form-control" type="text"
                        name="items[{{$items->id}}]"></label>
                @endforeach
            </div>
            @endforeach
            <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

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
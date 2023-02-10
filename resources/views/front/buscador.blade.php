@extends('layouts.front')
@section('content')
<!-- Menu-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color:#ada191">
    <div class="container">
        <!-- Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <!-- añadir ruta -->
                <img src="/storage/{{$logotipo->key}}/{{$logotipo->value}}" alt="logotipo" width="130">
                <span class="d-none d-lg-block"> </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn d-flex justify-content-start"></i>
        </div>
        <!-- End Logo -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fas fa-bars ms-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                @foreach($categoriasList as $cat)
                <li class="nav-item"><a class="nav-link" href="/categoria/{{$cat->id}}">{{$cat->name}}</a></li>
                @endforeach
                <li class="nav-item"><a class="nav-link active" href="{{route('vistaBuscador')}}">Buscador</a></li>

            </ul>

        </div>

    </div>
</nav>

<div class="container" style="margin-top: 120px;">
    <!-- Buscador General-->
    <div class="p-1 searchParent w-50">
        <form action="{{route('buscadorFront')}}" action="GET">
            <div class="input-group">
                <input type="text" class="form-control" id="texto" name="textoBusqueda" placeholder="Busqueda general"
                    value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <!--Fin Buscador General-->

    <!-- Cheackbox categorias -->
    <form action="" action="GET">
        @foreach ($categoriasList as $key => $categoria)
        <label class="form-check-label mb-3  mt-3"><input @if ($key==0) checked @endif class="form-check-input"
                type="radio" id="categoria{{$key}}" name="categoria" onclick="showItems(this)"
                value="{{$categoria->name}}"> {{$categoria->name}}</label> &nbsp
        @endforeach
        <!--Fin Cheackbox categorias -->

        <!-- Fin Buscador -->
        <div class="d-flex" style="text-align:justify">
            @foreach ($categoriasList as $key => $categoria)
            <div class="@if ($key != 0) d-none @endif items categoria{{$key}} ">
                @foreach($categoria->items as $items)
                <label class="col-md-5"> {{$items->name}} <input class="form-control" type="text"
                        name="{{$items->name}}"></label>
                @endforeach
            </div>
            @endforeach
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
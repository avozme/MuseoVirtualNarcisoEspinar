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

<div class="container">
    <!-- Buscador General-->
    <div class="p-1 searchParent">
        <form action="{{route('productoPorCategoria', [$categoria->id ?? ''])}}" action="GET">
            <div class="input-group">
                <input type="text" class="form-control" id="texto" name="textoBusqueda"
                    placeholder="Buscar en {{$categoria->name ?? ''}}"
                    value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <!-- Fin Buscador -->



</div>

@endsection
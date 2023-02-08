@extends('layouts.front')
@section('content')
<div id="page-top">
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
                    <li class="nav-item"><a class="nav-link {{optional($categoria)->id == $cat->id ? 'active' : ''}}"
                            href="/categoria/{{$cat->id}}">{{$cat->name}}</a></li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link"  href="{{route('vistaBuscador')}}">Buscador</a></li>

                </ul>

            </div>

        </div>
        <!-- Buscador -->
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
    </nav>
    <!-- Fin menu -->
    <section class="page-section bg-light" id="portfolio">

        <div class="">
            <div class="grid">
                <!-- Pintando los productos con su modal -->
                @foreach($todosProductos as $key => $producto)
                <div class="gridItem">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#producto{{$producto->id}}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src='{{asset("storage/$producto->id/$producto->image")}}'
                                width="auto">
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$producto->name}}</div>
                        </div>
                    </div>
                </div>

                <div class="portfolio-modal modal fade" id="producto{{$producto->id}}" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><svg id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 579.74 579.74">
                                    <defs>
                                        <style>
                                        .cls-1 {
                                            fill: none;
                                            stroke: #000;
                                            stroke-miterlimit: 10;
                                            stroke-width: 6px;
                                        }
                                        </style>
                                    </defs>
                                    <line class="cls-1" x1="2.12" y1="2.12" x2="577.62" y2="577.62" />
                                    <line class="cls-1" x1="2.12" y1="577.62" x2="577.62" y2="2.12" />
                                </svg></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase pb-4">{{$producto->name}}</h2>
                                            <div id="carouselExampleIndicators{{$key}}"
                                                class="carousel carousel-dark slide" data-bs-ride="true">
                                                <div class="carousel-indicators">
                                                    <button type="button"
                                                        data-bs-target="#carouselExampleIndicators{{$key}}"
                                                        data-bs-slide-to="0" class="active"
                                                        aria-label="Slide 0"></button>
                                                    @foreach($producto->imagenes as $index => $image)
                                                    <button type="button"
                                                        data-bs-target="#carouselExampleIndicators{{$key}}"
                                                        data-bs-slide-to="{{$index + 1}}"
                                                        aria-label="Slide {{$index + 1}}"></button>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="center-block w-40"
                                                            src='{{asset("storage/$producto->id/$producto->image")}}'
                                                            alt="..." />
                                                    </div>
                                                    @foreach($producto->imagenes as $image)
                                                    <div class="carousel-item">
                                                        <img src='{{asset("storage/$producto->id/$image->image")}}'
                                                            class="center-block w-40">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleIndicators{{$key}}"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleIndicators{{$key}}"
                                                    data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                            <!-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> -->
                                            @foreach ($producto->items as $item)
                                            <strong>{{$item->name}}:</strong> {{$item->pivot->value}}<br>
                                            @endforeach
                                            <!-- <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                        <i class="fas fa-xmark me-1"></i>
                                                        Close Project
                                                    </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--FIN Pintando los productos con su modal -->
            </div>

            <div class="d-flex justify-content-center">
                {!! $todosProductos->links() !!}
            </div>
        </div>
</div>
</div>
</section>
<!-- FOOTER -->
@endsection
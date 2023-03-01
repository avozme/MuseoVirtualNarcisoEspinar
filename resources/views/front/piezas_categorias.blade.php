@extends('layouts.front')
@section('content')
<div id="page-top">
    <!-- Menu-->
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="buscador_nav" style="--color_nav: {{ $opciones['color_nav'] }}">
        <div class="container" id="piezas_categorias">
            <!-- Logo -->
            <div class="d-flex align-items-center justify-content-between">
                <a href="" class="logo d-flex align-items-center">
                    <!-- añadir ruta -->
                    <img src="/storage/images/{{ $opciones['logo'] }}" alt="logotipo" width="{{$opciones['width']}}" height="{{$opciones['height']}}">
                    <span class="d-none d-lg-block"> </span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn d-flex justify-content-start"></i>
            </div>
            <!-- End Logo -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars ms-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive" 
                 style="font-family: {{$opciones['tipografia1']}};
                        --color_raton_encima_elementos_menu: {{$opciones['color_raton_encima_elementos_menu']}};    
                        --color_elementos_menu: {{$opciones['color_elementos_menu']}}">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    @foreach($categoriasList as $cat)
                    @if(isset($categoria))
                        <li class="nav-item">
                                <a class="nav-link {{optional($categoria)->id == $cat->id ? 'active' : ''}}" href="/categoria/{{$cat->id}}">
                                    {{$cat->name}}
                                </a>
                        </li>
                    @else 
                       <li class="nav-item">
                            <a class="nav-link" href="/categoria/{{$cat->id}}">
                                {{$cat->name}}
                            </a>
                       </li>
                    @endif
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="{{route('vistaBuscador')}}">Buscador</a></li>

                </ul>

            </div>

        </div>
        <!-- Buscador -->
        @if(isset($categoria))
        <div class="p-1 searchParent" style="font-family: {{$opciones['tipografia1']}}">
            <form action="{{route('productoPorCategoria', [$categoria->id ?? ''])}}" action="GET">
                <div class="input-group">
                    <input type="text" class="form-control" id="texto" name="textoBusqueda"
                        placeholder="Buscar en {{$categoria->name ?? ''}}"
                        value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                    <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        @endif
        <!-- Fin Buscador -->
    </nav>
    <!-- Fin menu -->
    <section class="page-section bg-light" id="portfolio" style="--paginacion: {{ $opciones['paginacion_color'] }}; background-color: {{ $opciones['color_fondo'] }}!IMPORTANT;">

        <div class="" style="font-family: {{$opciones['tipografia1']}}">
            <div class="grid">
                @if (isset($msg) && !blank($msg))
                <div class="text-center">
                    {{$msg}}
                </div>
                @endif
                <!-- Pintando las cajas de los productos -->
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
                <!-- Creando los cuadros modales de cada prodcto -->
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
                                            <h2 class="title text-uppercase pb-4">{{$producto->name}}</h2>
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
                                                    <div class="carousel-item active w-100">
                                                        <img id="mi_imagen{{$key}}" class="center-block w-40"
                                                            src='{{asset("storage/$producto->id/$producto->image")}}'
                                                            alt="{{$producto->image}}" height="500" />
                                                    </div>
                                                    @foreach($producto->imagenes as $image)
                                                    <div class="carousel-item">
                                                        <img src='{{asset("storage/$producto->id/$image->image")}}'
                                                            class="center-block" height="500" alt="{{$image->image}}">
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

                                            <div class='items'>
                                                @foreach ($producto->items as $item)
                                                <strong>{{$item->name}}:</strong> {{$item->pivot->value}}<br>
                                                @endforeach
                                            </div>

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
                @if(isset($pages))
                <form action="{{route('buscadorPorCampos')}}" method="POST">
                    @csrf
                    <input type="hidden" name="categoria_id" value="{{$categoria_id}}">
                    @foreach($items as $key => $item)
                    <input type="hidden" name="items[{{$key}}]" value="{{$item}}">
                    @endforeach
                    <nav>
                        <ul class="pagination">
                            <li class="page-item {{$currentPage == 1 ? 'disabled' : ''}}">
                                <button class="page-link" rel="next" aria-label="« Previous" name="page"
                                    value="{{$currentPage-1}}">‹</a>
                            </li>
                            @for($i = 1; $i <= $pages; $i++) <li
                                class="page-item {{$currentPage == $i ? 'active' : ''}}">
                                <button class="page-link" name="page" {{$currentPage == $i ? 'active' : ''}}
                                    value="{{$i}}">{{$i}}</button>
                                </li>
                                @endfor
                                <li class="page-item {{$currentPage == $pages ? 'disabled' : ''}}">
                                    <button class="page-link" rel="next" aria-label="Next »" name="page"
                                        value="{{$currentPage+1}}">›</a>
                                </li>
                        </ul>
                    </nav>
                </form>
                @else
                {{$todosProductos->links()}}
                @endif
            </div>
        </div>
</div>
</div>
</section>
<!-- FOOTER -->
@endsection
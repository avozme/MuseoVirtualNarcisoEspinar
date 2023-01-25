<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Museo arqueológico</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Mi fuente-->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/css/frontStyles.css" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color:#ada191">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars ms-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    @foreach($categoriasList as $categoria)
                    <li class="nav-item"><a class="nav-link"
                            href="/categoria/{{$categoria->id}}">{{$categoria->name}}</a></li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link" href="/#about">Sobre Narciso</a></li>

                </ul>

            </div>

        </div>
        <!-- Buscador -->
        <div class="d-flex w-100 pt-3">
            <div class="input-group">
                <form action="{{route('buscador')}}" action="POST">
                    <input type="text" class="form-control" id="texto" name="textoBusqueda" placeholder="Ingrese nombre"
                        value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                    <input type="hidden" name="idCategoria" value="{{$idCategoria}}">
                    <input type="submit" value="Buscar">
                    <!-- <div class="input-group-append"><span class="input-group-text">Buscar</span></div> -->
                </form>
            </div>
        </div>
        <!-- Fin Buscador -->
    </nav>

    <section class="page-section bg-light" id="portfolio">
        <div class="">
            <div class="grid">

                <!-- #######################################################################################################################
                                    RECUPERAR ITEMS Y SU VALORES + AÑADIR FOTOS ADICIONALES
     ####################################################################################################################### -->

                @foreach($todosProductos as $producto)
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
                                            <div id="carouselExampleIndicators" class="carousel carousel-dark slide"
                                                data-bs-ride="true">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="0" class="active" aria-current="true"
                                                        aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
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
                                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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
            </div>
        </div>
        </div>
        </div>
    </section>

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; JJ</div>
                <div class="col-lg-9 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Politica de privacidad</a>
                    <a class="link-dark text-decoration-none me-3" href="#!">Terminos de uso</a>
                    <a class="link-dark text-decoration-none me-3" href="#!">Aviso legal</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
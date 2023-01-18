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
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color:#ada191">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="/piezas_arqueologicas">Piezas Arqueológicas</a></li>
                        <li class="nav-item"><a class="nav-link" href="/postales">Postales</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Sobre Narciso</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Buscador</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section bg-light" id="portfolio">
        <div class=""> 

                <div class="grid">
                    
                    @foreach($todosProductos as $producto)
                        <div class="gridItem">
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#producto{{$producto->id}}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src='{{asset("storage/$producto->id/$producto->image")}}' width="auto">
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{$producto->name}}</div>
                                </div>
                            </div>
                        </div>

                            <div class="portfolio-modal modal fade" id="producto{{$producto->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="close-modal" data-bs-dismiss="modal"><svg id="Layer_1" data-name="Layer 1"  viewBox="0 0 579.74 579.74"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:6px;}</style></defs><line class="cls-1" x1="2.12" y1="2.12" x2="577.62" y2="577.62"/><line class="cls-1" x1="2.12" y1="577.62" x2="577.62" y2="2.12"/></svg></div>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="modal-body">
                                                    <!-- Project details-->
                                                    <h2 class="text-uppercase pb-4">{{$producto->name}}</h2>
                                                    @foreach($producto->imagenes as $image)
                                                    <img src='{{asset("storage/$producto->id/$image->image")}}' width="650" >
                                                    @endforeach
                                                    <!-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> -->
                                                    <img class="img-fluid d-block mx-auto" src='{{asset("storage/$producto->id/$producto->image")}}' alt="..." width="400" />
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
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- Nuestro js-->
        <script src="js/frontScripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
@extends('layouts.front')
@section('content')
<div id="page-top">
    <!-- Masthead-->
    <header class="masthead" style="background-image: url(/storage/images/{{$opciones['home_imagen_principal']}}); 
                   --tipografia1: {{$opciones['tipografia1'] }};
                   --tipografia2: {{$opciones['tipografia2'] }}">
        <div class="container">
            <div class="tituloPrincipal">
                <div class="masthead-subheading" style="--color_titulo_subtitulo: {{$opciones['color_titulo_subtitulo']}};
                            --color_sombra_titulo_subtitulo: {{$opciones['color_sombra_titulo_subtitulo']}};">
                    {{$opciones['home_titulo']}}
                </div>
                <div class="masthead-heading text-uppercase" style="--color_titulo_subtitulo: {{$opciones['color_titulo_subtitulo']}};
                            --color_sombra_titulo_subtitulo: {{$opciones['color_sombra_titulo_subtitulo']}};">
                    {{$opciones['home_subtitulo']}}
                </div>
            </div>
        </div>
    </header>

    <section class="page-section bg-light" id="portfolio"
        style="background-color: {{ $opciones['color_fondo'] }} !IMPORTANT; --tipografia1: {{$opciones['tipografia1']}}">
        <div class="container">
            <div class="Ticatego">COLECCIONES</div>
            <div class="grid">
                @foreach($productosList as $producto)
                <div class="gridItem">
                    <div class="portfolio-item">
                        <a class="portfolio-link" href="/categoria/{{$producto->categoria->id}}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/storage/{{$producto->id}}/{{$producto->image}}" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$producto->categoria->name}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</div>
</section>


<section class="page-section bg-light" id="team"
    style="background-color: {{ $opciones['color_fondo'] }} !IMPORTANT; --tipografia1: {{$opciones['tipografia1']}}">
    <div class="container">
        {!! $opciones['home_info_adicional'] !!}
    </div>

</section>
<!-- Clients-->
<!-- Contact-->
<section class="page-section" id="contact" style="--tipografia1: {{$opciones['tipografia1']}}">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contáctanos</h2>
            <h3 class="section-subheading text-muted">Los campos que contengan (*) son obligatorios.</h3>
        </div>

        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Nombre *"
                            data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">Introduzca un nombre.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Correo *"
                            data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">Introduzca un correo.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Introduzca una dirección de
                            correo valida.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="Teléfono"
                            data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Introduzca su teléfono</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="Escriba aquí su aportación... *"
                            data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Debe escribir un mensaje
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">El formulario se ha enviado con éxito</div>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error al enviar el mensaje</div>
            </div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton"
                    type="submit">Enviar</button></div>
        </form>
    </div>
</section>
</div>
@endsection
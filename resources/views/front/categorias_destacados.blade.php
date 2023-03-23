@extends('layouts.front')
@section('content')
    <div id="page-top">
        <section class="page-section bg-light" id="portfolio"
            style="background-color: {{ $opciones['color_fondo'] }}!IMPORTANT;">
            <div class="" style="font-family: {{$opciones['tipografia3']}}">
                <div class="grid">
                    @if (isset($msg) && !blank($msg))
                    <div class="text-center">
                        {{$msg}}
                    </div>
                    @endif
                    
                    @foreach($valores as $key => $valor)
                    <div class="gridItem">

                        <div class="portfolio-item">
                            <a class="portfolio-link" 
                               href="{{route('front.porItemDestacado', ['idCategoria' => $categoria->id, 'idItem' => $idItem, 'valorItem' => strip_tags($valor->value)])}}">
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{strip_tags($valor->value)}}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection

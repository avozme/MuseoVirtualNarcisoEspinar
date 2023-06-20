@extends('layouts.front')
@section('content')
<style>
    p{
      text-align: justify;
    }
</style>
  
<div class="container" style="margin-top: 1.5in  --tipografia3: {{$opciones['tipografia3']}}">
  {!! $opciones['acerca_de_contenido'] !!}
</div>
@endsection


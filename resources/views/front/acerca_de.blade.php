@extends('layouts.front')
@section('content')
<style>
  p{
    text-align: justify;
  }
</style>
<div class="container">
  <div class="avisos_legales" style="padding-top: 1.4in;  --tipografia3: {{$opciones['tipografia3']}}">
    <p> 
      {!! $opciones['acerca_de_contenido'] !!}
    </p>
      
  </div>
</div>
<br><br><br><br>

@endsection


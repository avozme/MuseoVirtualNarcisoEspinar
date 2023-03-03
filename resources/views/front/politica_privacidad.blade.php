@extends('layouts.front')
@section('content')
<div class="avisos_legales" style="padding-top: 2in;  --tipografia3: {{$opciones['tipografia3']}}">
    {!! $opciones['politica_privacidad']!!}
</div>
@endsection


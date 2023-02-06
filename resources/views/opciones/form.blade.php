@extends("layouts.master")

@section("title", "Inserción de opciones")

@section("header", "Inserción de opciones")

@section("content")
    @isset($opcion)
        <form action="{{ route('opciones.update', ['opcione' => $opcion->id]) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
            @csrf
            <div class="container-fluid">
                <label class="control-label w-100 mt-2">Valor:</label>
                <input class="form-control mt-2" type="text" name="value" value="{{$opcion->value ?? '' }}">
                @if($opcion->type == 'foto')
                <label class="control-label w-100 mt-2">Foto:</label>
                <img class="mt-2" src="/storage/{{$opcion->key}}/{{$opcion->value}}" width=200 /><br>
                <input class="form-control mt-2" type="file" accept="image/*" name="image" value="">
                @endif
                <label class="control-label w-100 mt-2">Clave:</label>
                 <input class="form-control mt-2"  type="text" name="key" value="{{$opcion->key ?? '' }}"> <!--Si se pone disabled en el input no se modifiquen los valores -->
                 <label class="control-label w-100 mt-2">Tipo:</label>
                  <input class="form-control mt-2"  type="text" name="type" value="{{$opcion->type ?? '' }}">
                <input class="btn btn-dark center mt-2" type="submit" value="Enviar">
            </div>
        </form>
        @else

        <form action="{{ route('opciones.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
                <label class="control-label w-100 mt-2">Valor:</label>
                <input class="form-control mt-2" type="text" name="value">
                <label class="control-label w-100 mt-2">Clave:</label>
                 <input class="form-control mt-2"  type="text" name="key" > <!--Si se pone disabled en el input no se modifiquen los valores -->
                 <label class="control-label w-100 mt-2">Tipo:</label>
                  <input class="form-control mt-2"  type="text" name="type" >
                <input class="btn btn-dark center mt-2" type="submit" value="Enviar">
            </div>
        </form>
        @endisset
@endsection
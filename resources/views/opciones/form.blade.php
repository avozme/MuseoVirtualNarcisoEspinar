@extends("layouts.master")


@section("title", "Inserción de opciones")

@section("header", "Inserción de opciones")

@section("content")
    @isset($opcion)
        <form action="{{ route('opciones.update', ['opcione' => $opcion->id]) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
            @csrf
            <div class="container-fluid">
                @if($opcion->type == 'foto')
                    <!-- Opción de tipo "foto" -->
                    <label class="control-label w-100 mt-2">Foto:</label>
                    <img class="mt-2" src="/storage/{{$opcion->key}}/{{$opcion->value}}" width=200 /><br>
                    <input class="form-control mt-2" type="file" accept="image/*" name="image" value="">
                @elseif($opcion->type == 'color')
                <!-- Opción de tipo "color" -->
                    <label class="control-label w-100 mt-2">Valor:</label>
                    <input class="form-control mt-2" id="value" type="text" name="value" value="{{$opcion->value ?? '' }}">
                    <label class="control-label w-100 mt-2">Color:</label>
                    <input type="color" id="color" onChange="actualizarColor()" name="color" value="{{$opcion->value}}">
                @elseif($opcion->type == 'longText')
                <!-- Opción de tipo "longText" -->
                    <label class="control-label w-100 mt-2">Texto:</label>
                    <textarea name="value" id="value" cols="50" rows="20">{{$opcion->value}}</textarea>
                @else
                <!-- Opción de otro tipo. Todas se tratarán como "text" -->
                    <label class="control-label w-100 mt-2">Valor:</label>
                    <input class="form-control mt-2" id="value" type="text" name="value" value="{{$opcion->value ?? '' }}">
                @endif
                <label class="control-label w-100 mt-2">Clave:</label>
                <input class="form-control mt-2"  type="text" name="key" disabled value="{{$opcion->key ?? '' }}"> <!--Si se pone disabled en el input no se modifiquen los valores -->
                <label class="control-label w-100 mt-2">Tipo:</label>
                <input class="form-control mt-2"  type="text" name="type" disabled value="{{$opcion->type ?? '' }}">
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

        <script>
            function actualizarColor(){
                color=document.getElementById("color").value;
                document.getElementById("value").value = color;
            }
        </script>

@endsection

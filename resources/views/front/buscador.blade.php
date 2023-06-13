@extends('layouts.front')
@section('content')
<div class="container" style="margin-top: 120px; margin-bottom: 40px;">

    <!-- Buscador General-->
    <div class="w-50 pb-5" id="buscador_general_front">
        <form action="{{route('buscadorFront')}}" method="GET">
            <div class="input-group" style="font-family: {{$opciones['tipografia3']}}">
                <input type="text" class="form-control" id="texto" name="textoBusqueda" placeholder="Busqueda general"
                    value="{{isset($textoBusqueda) ? $textoBusqueda : ''}}">
                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="informacion_busquedas" style="font-family: {{$opciones['tipografia3']}}">
                La búsqueda se realizará en todos los campos de todas las categorías.<br>
                El resultado de su búsqueda es una aproximación, para buscar coincidencias exactas existe la posibilidad
                de buscar el texto entre comillas "".</div>
        </form>
        <div class="signos_diacriticos">
        <div style="font-family: Roboto">Signos Diacríticos:</div>

        <table style="font-size:36px">
            <tr>
                <td>Ā</td>
                <td>Ī</td>
                <td>Ū</td>
                <td>Š</td>
                <td>Ŷ</td>
                <td>Ḥ</td>
                <td>Ṣ</td>
                <td>Ḍ</td>
                <td>Ẓ</td>
                <td>Ṭ</td>
                <td>Ḏ</td>
                <td>Ṯ</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ā</td>
                <td>ī</td>
                <td>ū</td>
                <td>š</td>
                <td>ŷ</td>
                <td>ḥ</td>
                <td>ṣ</td>
                <td>ḍ</td>
                <td>ẓ</td>
                <td>ṭ</td>
                <td>ḏ</td>
                <td>ṯ</td>
                <td>ʿ</td>
                <td>’</td>
            </tr>
        </table>
    </div>
    </div>
    <!--Fin Buscador General-->
    <br>
    <br>
    <br>
    <!-- Checkbox categorias -->
    
    <div class="buscador_por_campos pt-5">
        <form action="{{route('buscadorPorCampos')}}" method="POST" id="formBusqueda" style="font-family: {{$opciones['tipografia3']}}">
            BÚSQUEDA POR CAMPOS: <br>
            <div class="informacion_busquedas" style="font-family: {{$opciones['tipografia3']}}">
                El buscador por campos realizará la búsqueda en el/los campo/s deseado/s de la categoría seleccionada
                (casillas redondas).<br>
                Además, el resultado buscará coincidencias parecidas a su búsqueda.<br>
                Para buscar coincidencias exactas existe la posibilidad de buscar el texto entre comillas "".</div>
            @csrf
            @foreach ($categoriasList as $key => $categoria)
            <label class="form-check-label mb-3  mt-3"><input @if ($key==0) checked @endif class="form-check-input"
                    type="radio" id="categoria{{$key}}" name="categoria_id" onclick="showItems(this)"
                    value="{{$categoria->id}}"> {{$categoria->name}}</label> &nbsp
            @endforeach
            <!--Fin Checkbox categorias -->

            <!-- Fin Buscador -->
            <div class="d-flex" style="text-align:left">
                @foreach ($categoriasList as $key => $categoria)
                    <div class="@if ($key != 0) d-none @endif items categoria{{$key}} ">
                        @foreach($categoria->items as $item)
                            <label class="col-md-4" style="margin-right:7%">
                                {{$item->name}}
                                <input class="form-control" type="text" name="items[{{$item->id}}][texto]">
                                <input type="hidden" name="items[{{$item->id}}][categoria_id]" value="{{$item->categoria->id}}">
                                <input type="hidden" name="items[{{$item->id}}][item_id]" value="{{$item->id}}">
                            </label>
                        @endforeach
                    </div>
                @endforeach

            </div>
            <p class="text-danger" id="sendError"></p>
            <button id="botonBusquedaCampos" class="mt-3 btn btn-dark" type="submit">Buscar &nbsp;&nbsp;&nbsp;<i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<script>
    const botonBusquedaCampos = document.getElementById('botonBusquedaCampos')
    const form = document.getElementById('formBusqueda')
    botonBusquedaCampos.addEventListener('click',(event)=>{
        let sendForm = false
        form.querySelectorAll('input[name^="items"]').forEach((el) => {
            if(el.value != '') sendForm = true
        })
        if(!sendForm){
            event.preventDefault()
            document.getElementById('sendError').innerHTML = 'Tienes que rellenar al menos un campo'
        } 
    })
</script>
@endsection

<script>
function showItems(element) {
    document.querySelectorAll('.items').forEach((el) => {
        el.classList.add('d-none')
    })
    document.querySelector("." + element.id).classList.remove('d-none')

}
</script>
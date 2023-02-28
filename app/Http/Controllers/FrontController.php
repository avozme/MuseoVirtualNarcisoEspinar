<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Opciones;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $productosList = Productos::recuperarProductosFront();
        $categoriasList = Categorias::orderBy('name')->get();
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        return view('front.front', ['productosList'=>$productosList, 'categoriasList'=>$categoriasList,'opciones' => $opciones]);
    }

    public function show($id) {
        $p = Productos::find($id);
        $data['productos'] = $p;
        $categoria = Categorias::find($r->idCategoria);
        return view('categorias.show', $data);
    }

    public function mostrarCategorias($id, Request $r) {
        $categoria = Categorias::find($id);
        $categoriasList = Categorias::orderBy('name')->get();
        $todosProductos = blank($r->textoBusqueda) ? Productos::recuperarPorCategoria($id) : Productos::busquedaCategorias($id, $r->textoBusqueda);
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        $msg = count($todosProductos) > 0 ? null : 'No hay resultados de búsqueda';
        return view('front.piezas_categorias', ['msg'=> $msg,'todosProductos'=>$todosProductos,'categoriasList'=>$categoriasList,'categoria' => $categoria,
        'textoBusqueda' => $r->textoBusqueda, 'opciones' => $opciones]);
    }

    /*Funcion buscador categorías para que solo funcione en la vista de la categoria seleccionada*/
    public function buscadorCategorias(Request $r) {
        $categoria = Categorias::find($r->idCategoria);
        $categoriasList = Categorias::orderBy('name')->get();
        $todosProductos = blank($r->textoBusqueda) ? Productos::recuperarPorCategoria($id) : Productos::busquedaCategorias($id, $r->textoBusqueda);
        $todosProductos = Productos::busquedaCategorias($r->idCategoria, $r->textoBusqueda);
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        $msg = count($todosProductos) > 0 ? null : 'No hay resultados de búsqueda';
        return view('front.piezas_categorias', ['productosList'=>$productosList, 'categoriasList'=>$categoriasList, 'opciones' => $opciones, 
                    'msg'=> $msg,'textoBusqueda'=> $r->textoBusqueda, 'todosProductos'=>$todosProductos,
                    'categoriasList'=>$categoriasList, 'idCategoria' => $r->idCategoria, 'categoria' => $categoria]);
    }

    /*Funcion vista buscador prepara todas las categorías e items para mostrarlos en la página del buscador*/
    public function vistaBuscador(Request $r) {
        $categoriasList = Categorias::orderBy('name')->get();
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        return view('front.buscador', ['categoriasList'=>$categoriasList, 'textoBusqueda' => $r->textoBusqueda, 'opciones' => $opciones]);
    }

    /*Funcion buscador general front*/ 
    public function buscadorGeneral(Request $r) {
        $categoriasList = Categorias::orderBy('name')->get();
        $todosProductos = Productos::busquedaProductos($r->idCategoria, $r->textoBusqueda);
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        $msg = count($todosProductos) > 0 ? null : 'No hay resultados de búsqueda';       
        return view('front.piezas_categorias', ['textoBusqueda'=> $r->textoBusqueda, 'msg'=> $msg, 'todosProductos'=>$todosProductos,
                    'categoriasList'=>$categoriasList, 'textoBusqueda' => $r->textoBusqueda, 'opciones' => $opciones]);
    }

    /*Funcion por campos según categoría front*/ 
    public function buscadorPorCampos(Request $r) {
        /*Si $r->page es null al convertirlo en intval es 0 y si es 0 por default es 1 */
        $currentPage = intval($r->page) == 0 ? 1 : intval($r->page);
        /*Cada cuanto pagina*/
        $pagination = 8;
        $productosList = Productos::busquedaCampos($r->categoria_id, $r->items);
        /*El numero de pagina que tiene los productos  -Ceil redondea hacia arriba- */
        $pages = ceil(count($productosList->get()) / $pagination);
        /*Te hace un get de los productos y se salta los productos de la pagian en la que estas y coge el numero de productos que tiene la paginacion ($currentPage-1)  */
        // for ($i = 0; $i < ($currentPage - 1) * $pagination; $i++) {
            $todosProductos =  $productosList->skip(($currentPage - 1) * $pagination)->take($pagination)->get();
        // }

        $categoriasList = Categorias::orderBy('name')->get();
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        $msg = count($productosList->get()) > 0 ? null : 'No hay resultados de búsqueda';
        return view('front.piezas_categorias', ['categoria_id' => $r->categoria_id,'msg'=> $msg,'currentPage' => $currentPage, 
                    'pages' => $pages, 'items' => $r->items, 'textoBusqueda'=> $r->textoBusqueda, 
                    'opciones' => $opciones, 'todosProductos'=>$todosProductos, 'categoriasList'=>$categoriasList]);
    }

    // Muestra la vista de "acerca de"
    public function acercaDe() {
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        return view('front.acerca_de', ['opciones' => $opciones]);
    }

    // Muestra la vista de "política de privacidad"
    public function politicaPrivacidad() {
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        return view('front.politica_privacidad', ['opciones' => $opciones]);
    }

    // Muestra la vista de "política de cookies"
    public function politicaCookies() {
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        return view('front.politica_cookies', ['opciones' => $opciones]);
    }

    // Muestra la vista de "términos de uso"
    public function terminosUso() {
        $opciones = $this->convertToArray(Opciones::all(), 'key', 'value');
        return view('front.terminos_uso', ['opciones' => $opciones]);
    }
    

    // Esta función convierte una colección en un array usando el campo llamado "key" como clave 
    // y el campo llamado "value" como valor. Está pensada para convertir la colección Opciones:all() en un array
    // indexado por el campo "key", para usarlo en las vistas con más comodidad de la colección.
    private function convertToArray($collection, $key_column, $value_column){
        $keys=$collection->pluck($key_column)->all();
        $values=$collection->pluck($value_column)->all();
        return array_combine($keys, $values);
        // style="--color_nav: {{$opciones->where('key', 'color_nav')->pluck('value')->first()}}"
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;

class Productos extends Model
{

    protected $fillable = ["name", "remarks", "dimensions", "image", "categoria_id"];

    /* Relación tablas*/
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categorias');
    }

    public function etiquetas()
    {
        return $this->belongsToMany('App\Models\Etiquetas');
    }

    public function items()
    {
        return $this->belongsToMany('App\Models\Items')->orderBy('order')->withPivot('value');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Models\Imagenes', 'producto_id');
    }
    use HasFactory;
    /*Fin Relación tablas*/

    /*Te recupera todos los productos de todas las categorias y te saca un producto random para que vaya variando la foto del front de la zona de colecciones */
    public static function recuperarProductosFront()
    {
        $listaCategorias = Categorias::all();
        $listaProductos = array();
        foreach ($listaCategorias as $categoria) {
            if ($categoria->productos->count() > 0) {
                $listaProductos[] = $categoria->productos->random();
            }
        }
        return $listaProductos;
    }

    /*Recupera los productos de una categoria ordenados aleatoriamente y los pagina cada X objetos */
    public static function recuperarPorCategoria($id)
    {
        $listaProductos = Productos::where('categoria_id', $id)->orderBy('name');
        $elementosPorPagina = Opciones::where('key', 'paginacion_cantidad_elementos')->first()->value;
        return $listaProductos->paginate($elementosPorPagina);
    }

    /*Buscador Front que segun en la categoria en la que se encuentra ejecutara la consulta contra esa categoria */
    public static function busquedaCategorias($idCategoria, $textoBusqueda)
    {
        if (strpos($textoBusqueda, '"') === 0) {
            $pos_comillas_inicio = strpos($textoBusqueda, '"') + 1;
            $pos_comillas_fin = strpos($textoBusqueda, '"', $pos_comillas_inicio);
            $texto_entre_comillas = substr($textoBusqueda, $pos_comillas_inicio, $pos_comillas_fin - $pos_comillas_inicio);
            $resultadoBusqueda = Productos::select('productos.id', 'productos.name', 'productos.image', 'categorias.name as categoriaName')
                ->join("items_productos", "productos.id", "items_productos.productos_id")
                ->join("categorias", "productos.categoria_id", "categorias.id")
                ->where("productos.categoria_id", $idCategoria)
                ->where(function ($query) use ($texto_entre_comillas) {
                    $query->where("productos.name", "$texto_entre_comillas")
                        ->orwhere("items_productos.value", "$texto_entre_comillas");
                })->groupBy('productos.id', 'name', 'image', 'categorias.name')->distinct()->paginate(9);
        } else {
            $resultadoBusqueda = Productos::select('productos.id', 'productos.name', 'productos.image', 'categorias.name as categoriaName')
                ->join("items_productos", "productos.id", "items_productos.productos_id")
                ->join("categorias", "productos.categoria_id", "categorias.id")
                ->where("productos.categoria_id", $idCategoria)
                ->where(function ($query) use ($textoBusqueda) {
                    $query->where("productos.name", "like", "%$textoBusqueda%")
                        ->orwhere("items_productos.value", "like", "%$textoBusqueda%");
                })->groupBy('productos.id', 'name', 'image', 'categorias.name')->distinct()->paginate(9);
        }
        return $resultadoBusqueda->appends(['textoBusqueda' => $textoBusqueda]);
    }

    /* Buscador front/back que segun en la categoria en la que se encuentra ejecutara la consulta contra esa categoria */
    /* Si el idCategoria es NULL, busca en todas las categorias*/
    public static function busquedaProductos($idCategoria, $textoBusquedaOG)
    {
        $resultadoBusqueda = collect();  // Creamos colección vacía para ir añadiendo los resultados de las búsquedas
        if ($textoBusquedaOG == "" && $idCategoria != NULL) {
            // CASO 1: No hay texto de búsqueda, pero sí hay categoría --> Buscamos todos los productos de la categoría
            $resultadoBusqueda = $resultadoBusqueda->merge(Productos::with('categoria')
                ->where("productos.categoria_id", "$idCategoria")->distinct()->get());
        } else if ($textoBusquedaOG == "" && $idCategoria == NULL) {
            // CASO 2: No hay texto de búsqueda ni categoría --> Buscamos todos los productos
            $resultadoBusqueda = $resultadoBusqueda->merge(Productos::all());
        } else {
            // CASO 3: Hay texto de búsqueda --> Buscamos productos que coincidan con el texto de búsqueda
            $textoLimpio = Productos::limpiezaBuscador($textoBusquedaOG); // Limpia el texto de palabras comunes (como artículos) y lo trocea en palabras individuales
            foreach ($textoLimpio as $textoBusqueda) {
                if (strpos($textoBusqueda, '"') === false) {
                    // CASO 3A: El texto de búsqueda NO contiene comillas --> Búsqueda LIKE
                    if ($idCategoria != NULL) {
                        $resultadoBusqueda = $resultadoBusqueda->merge(Productos::with('categoria')
                            ->where("productos.categoria_id", "$idCategoria")
                            ->where("productos.name", "like", "%$textoBusqueda%")->distinct()->get());
                    } else {
                        $resultadoBusqueda = $resultadoBusqueda->merge(Productos::where("productos.name", "like", "%$textoBusqueda%")->get());
                    }
                } else {
                    // CASO 3B: El texto de búsqueda SÍ contiene comillas --> Búsqueda EXACTA
                    $pos_comillas_inicio = strpos($textoBusqueda, '"') + 1;
                    $pos_comillas_fin = strpos($textoBusqueda, '"', $pos_comillas_inicio);
                    $texto_entre_comillas = substr($textoBusqueda, $pos_comillas_inicio, $pos_comillas_fin - $pos_comillas_inicio);
                    if ($idCategoria != NULL) {
                        $resultadoBusqueda = $resultadoBusqueda->merge(Productos::with('categoria')
                            ->where("productos.categoria_id", $idCategoria)
                            ->where("productos.name", "$texto_entre_comillas")->distinct()->get());
                    } else {
                        $resultadoBusqueda = $resultadoBusqueda->merge(Productos::where("productos.name", "$texto_entre_comillas")->get());
                    }
                }
            }
        }
        // Paginamos el resultado
        $resultadoPaginado = new LengthAwarePaginator($resultadoBusqueda, count($resultadoBusqueda), 9);
        $resultadoPaginado->appends(['textoBusqueda' => $textoBusquedaOG]);
        if ($idCategoria != NULL) $resultadoPaginado->appends(['idCategoria' => $idCategoria]);
        return $resultadoPaginado;
    }

    // public static function busquedaCampos($idCategoria, $items){
    //     $itemsNoVacios = array_keys(array_filter($items, function($valor){
    //         return $valor !== null;
    //     }));
    //     $listaCategorias = Categorias::find($idCategoria);
    //     $resultadoBusqueda = Productos::select('productos.id', 'productos.name','productos.image', 'items_productos.value')
    //     ->join("items_productos", "productos.id", "items_productos.productos_id")
    //     ->where("productos.categoria_id", $idCategoria)
    //     ->whereIn('items_productos.items_id', $itemsNoVacios)
    //     ->groupBy('productos.id', 'productos.name','productos.image', 'items_productos.value')->distinct();
    //     foreach ($items as $item_id => $value) {//item_id es la key y value son los valores de los input
    //         if(!blank($value)){
    //             $resultadoBusqueda->where('items_productos.value','like', "%$value%");
    //         }
    //     }
    //     return $resultadoBusqueda->get();
    // }

    public static function busquedaCampos($idCategoria, $items)
    {
        // Vamos a contar el número de items que vienen rellenos en el formulario de búsqueda
        $contador = 0;
        foreach ($items as $item_id => $value) {
            if ($value != null) {
                $contador++;
            }
        }

        $productos_ids = array();    // Lista de ids de productos que cumplen algún requisito de búsqueda
        $max_producto_id = 10000;   // ID más alto de la tabla de productos --> Sustituir por SELECT MAX(producto.id) FROM productos
        $aux = array($max_producto_id);
        $countItems = 0;

        // Búsqueda principal. Vamos a sacar los ids de los productos que cumplen al menos un requisito de búsqueda
        // y a construir un array con sus ids ($resultado)
        foreach ($items as $item_id => $value) { //item_id es la key y value son los valores de los input
            $valores = array();
            if (!blank($value)) {
                if (strpos($value, '"') === 0) {
                    $pos_comillas_inicio = strpos($value, '"') + 1;
                    $pos_comillas_fin = strpos($value, '"', $pos_comillas_inicio);
                    $texto_entre_comillas = substr($value, $pos_comillas_inicio, $pos_comillas_fin - $pos_comillas_inicio);
                    $countItems++;
                    $valores = Productos::select('productos.id')->distinct()
                        ->join('items_product   os', 'productos.id', '=', 'items_productos.productos_id')
                        ->where('productos.categoria_id', $idCategoria)
                        ->where('items_productos.items_id', $item_id)
                        ->where(DB::raw('strip_tags(items_productos.value)'), 'LIKE', $texto_entre_comillas)
                        ->get();

                    
                } else {
                    $countItems++;
                    $sql = "SELECT DISTINCT productos.id
                    FROM productos
                    INNER JOIN items_productos ON productos.id = items_productos.productos_id
                    WHERE productos.categoria_id = '$idCategoria'";
                    $sql = $sql . " AND items_productos.items_id = '$item_id'
                                    AND items_productos.value LIKE '%$value%'";

                    $valores = DB::select(DB::raw($sql));
                }
            }

            //Este foreach se encarga de guardar todos los array dentro de uno solo
            foreach ($valores as $valor) {
                array_push($productos_ids, $valor);
            }
        }

        for ($i = 0; $i < $max_producto_id; $i++) {
            $aux[$i] = 0;
        }
        foreach ($productos_ids as $producto) {
            $aux[$producto->id] = $aux[$producto->id] + 1;
        }
        $resultadoFinal = array();
        $aux_ids = array();
        for ($i = 0; $i < $max_producto_id; $i++) {
            if ($aux[$i] == $contador) {
                $producto = Productos::find($i);
                $resultadoFinal[] = $producto;
                $aux_ids[] = $producto->id;
            }
        }
        $productos = Productos::whereIn('id', $aux_ids);
        return $productos;
    }
    

    // Función de limpieza del texto de búsqueda para todos los buscadores.
    // Recibe un string con el texto de búsqueda y devuelve un array con las palabras sueltas,
    // excepto el texto entrecomillado, que se devuelve como un único elemento del array.
    // Las palabras comunes (como artículos o preposiciones) se eliminan del array.
    public static function limpiezaBuscador($textoBusqueda)
    {
        // Diccionario de palabras comunes que eliminaremos de los términos de búsqueda
        $diccionario = [
            'el', 'la', 'los', 'las', 'un', 'una', 'unos', 'unas', 'y', 'e', 'o', 'u',
            'a', 'ante', 'bajo', 'cabe', 'con', 'contra', 'de', 'desde', 'durante',
            'en', 'entre', 'hacia', 'hasta', 'mediante', 'para', 'por', 'según',
            'sin', 'sobre', 'tras', 'durante'
        ];

        $trozos = [];           // Array con los trozos del texto (palabras sueltas o textos entrecomillados)
        $trozoActual = '';      // Trozo que estamos procesando en cada momento
        $enComillas = false;    // Indica si estamos dentro de una sección entrecomillada o no

        // Recorreremos el texto carácter por carácter
        for ($i = 0; $i < strlen($textoBusqueda); $i++) {
            $caracter = $textoBusqueda[$i];

            // Si encontramos una comilla, cambiamos el estado de enComillas
            if ($caracter == '"') {
                if ($enComillas) {
                    // Si estamos dentro de una sección entrecomillada y encontramos otra comilla,
                    // significa que hemos llegado al final de la sección entrecomillada,
                    // así que agregamos el trozo actual al array de trozos y reiniciamos el trozo actual
                    $trozos[] = $trozoActual;
                    $trozoActual = '';
                }
                $enComillas = !$enComillas;  // Permutamos el valor de enComillas
            }

            // Si estamos fuera de una sección entrecomillada y encontramos un espacio,
            // agregamos el trozo actual al array de trozos y reiniciamos el trozo actual
            if (!$enComillas && $caracter == ' ') {
                if (!empty($trozoActual)) {
                    $trozos[] = $trozoActual;
                    $trozoActual = '';
                }
            } else if ($caracter != '"') {
                // Si el carácter no es un espacio ni una comilla, lo agregamos al trozo actual
                $trozoActual .= $caracter;
            }
        }

        // Agregamos el último trozo al array de trozos
        if (!empty($trozoActual)) {
            $trozos[] = $trozoActual;
            $trozoActual = '';
        }

        // Eliminamos del array las palabras comunes del diccionario
        $trozos = array_diff($trozos, $diccionario);

        // Devolvemos el array de trozos resultante
        return $trozos;
    }


    // Función que devuelve los productos que coinciden con un valor concreto de un ítem
    public static function recuperarPorCategoriaDestacado($idCategoria, $iditem, $valueItem) {
        $elementosPorPagina = Opciones::where('key', 'paginacion_cantidad_elementos')->first()->value;
        // Si el valor del ítem destacado tiene algo asignado, buscamos todos los productos con ese valor en ese ítem.
        // En cambio, si el ítem destacado no tiene valor asignado, buscamos todos los productos con una cadena vacía en ese ítem.
        if ($valueItem == "Sin Valor" || $valueItem == "Sin valor") {
            $productos = Productos::select('productos.id', 'productos.name', 'productos.image', 'categorias.name as categoriaName')
                                    ->join("categorias", "productos.categoria_id", "categorias.id")
                                    ->join("items_productos", "productos.id", "items_productos.productos_id")
                                    ->where("productos.categoria_id", $idCategoria)
                                    ->where("items_productos.items_id", $iditem)
                                    ->where("items_productos.value", "=", "")
                                    ->orWhere("items_productos.value", "=", "<p><br></p>")
                                    ->orWhere("items_productos.value", "=", "<p></p>")
                                    ->orWhereNull("items_productos.value")
                                    ->distinct()->orderBy('productos.name')->paginate($elementosPorPagina);
                                }
        else {
            $productos = Productos::select('productos.id', 'productos.name', 'productos.image', 'categorias.name as categoriaName')
                                    ->join("categorias", "productos.categoria_id", "categorias.id")
                                    ->join("items_productos", "productos.id", "items_productos.productos_id")
                                    ->where("productos.categoria_id", $idCategoria)
                                    ->where("items_productos.items_id", $iditem)
                                    ->where("items_productos.value", "like", "%$valueItem%")
                                    ->distinct()->orderBy('productos.name')->paginate($elementosPorPagina);
        }
        return $productos;
    }

    public static function busquedaGeneral($idCategoria, $textoBusqueda)
    {
        if (strpos($textoBusqueda, '"') === 0) {
            $pos_comillas_inicio = strpos($textoBusqueda, '"') + 1;
            $pos_comillas_fin = strpos($textoBusqueda, '"', $pos_comillas_inicio);
            $texto_entre_comillas = substr($textoBusqueda, $pos_comillas_inicio, $pos_comillas_fin - $pos_comillas_inicio);
            $resultadoBusqueda = Productos::select('productos.id', 'productos.name', 'productos.image', 'categorias.name as categoriaName')
                ->join("items_productos", "productos.id", "items_productos.productos_id")
                ->join("categorias", "productos.categoria_id", "categorias.id")
                ->where(function ($query) use ($texto_entre_comillas) {
                    $query->where("productos.name", "$texto_entre_comillas")
                        ->orWhere(DB::raw("strip_tags(items_productos.value)"), "$texto_entre_comillas");
                })
                ->groupBy('productos.id', 'name', 'image', 'categorias.name')
                ->distinct()
                ->paginate(9);
        } else {
            $resultadoBusqueda = Productos::select('productos.id', 'productos.name', 'productos.image')
                ->join("items_productos", "productos.id", "items_productos.productos_id")
                ->join("categorias", "productos.categoria_id", "categorias.id")
                ->where(function ($query) use ($textoBusqueda) {
                    $query->where("productos.name", "like", "%$textoBusqueda%")
                        ->orwhere("items_productos.value", "like", "%$textoBusqueda%");
                })->groupBy('productos.id', 'name', 'image', 'categorias.name')->distinct()->paginate(9);
        }
        return $resultadoBusqueda->appends(['textoBusqueda' => $textoBusqueda]);
    }

}
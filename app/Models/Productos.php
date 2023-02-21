<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Productos extends Model
{

    protected $fillable = ["name", "remarks", "dimensions", "image", "categoria_id"];

    /* Relación tablas*/
    public function categoria() {
        return $this->belongsTo('App\Models\Categorias');
        }

    public function etiquetas() {
        return $this->belongsToMany('App\Models\Etiquetas');
        }

    public function items() {
        return $this->belongsToMany('App\Models\Items')->orderBy('name')->withPivot('value');
    }

    public function imagenes() {
        return $this->hasMany('App\Models\Imagenes', 'producto_id');
    }
    use HasFactory;
   /*Fin Relación tablas*/

    /*Te recupera todos los productos de todas las categorias y te saca un producto random para que vaya variando la foto del front de la zona de colecciones */
    public static function recuperarProductosFront(){
        $listaCategorias = Categorias::all();
        $listaProductos = array();
        foreach ($listaCategorias as $categoria) {
            $listaProductos[] = $categoria->productos->random();
        }
        return $listaProductos;
    }
    /*Recupera los productos de una categoria y los pagina cada X objetos */
    public static function recuperarPorCategoria($id){
        $listaProductos = Productos::where('categoria_id', $id);
        return $listaProductos->paginate(4);
    }
    /*Buscador Front que segun en la categoria en la que se encuentra ejecutara la consulta contra esa categoria */
    public static function busquedaCategorias($idCategoria, $textoBusqueda){
         $resultadoBusqueda = Productos::select('productos.id', 'productos.name','productos.image')
        ->join("items_productos", "productos.id","items_productos.productos_id")
        ->where("productos.categoria_id", $idCategoria)
        ->where(function($query) use ($textoBusqueda){
            $query->where("productos.name", "like", "%$textoBusqueda%")
            ->orwhere("items_productos.value", "like", "%$textoBusqueda%");
        })->groupBy('productos.id', 'name', 'image')->distinct()->paginate(9);

        return $resultadoBusqueda->appends(['textoBusqueda' => $textoBusqueda]);
    }

    /*Buscador Back que segun en la categoria en la que se encuentra ejecutara la consulta contra esa categoria */
    /*Si se deja vacio busca contra las dos categorias*/
    public static function busquedaProductos($idCategoria, $textoBusqueda){
        if($idCategoria != NULL){
            $resultadoBusqueda = Productos::with('categoria')
            ->where("productos.categoria_id", $idCategoria)
            ->where("productos.name", "like", "%$textoBusqueda%")->distinct()->paginate(9);
            return $resultadoBusqueda->appends(['idCategoria' => $idCategoria, 'textoBusqueda' => $textoBusqueda]);  
        }
        else $resultadoBusqueda = Productos::where("productos.name", "like", "%$textoBusqueda%")->paginate(9);  
        return $resultadoBusqueda->appends(['textoBusqueda' => $textoBusqueda]);
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

    public static function busquedaCampos($idCategoria, $items){

        // Vamos a contar el número de items que vienen rellenos en el formulario de búsqueda
        $contador = 0;  
        foreach($items as $item_id => $value){
            if($value != null){
                $contador++;
            }
        }

        $productos_ids = array();    // Lista de ids de productos que cumplen algún requisito de búsqueda
        $max_producto_id = 10000;   // ID más alto de la tabla de productos --> Sustituir por SELECT MAX(producto.id) FROM productos
        $aux = array($max_producto_id);
        $countItems = 0;

        // Búsqueda principal. Vamos a sacar los ids de los productos que cumplen al menos un requisito de búsqueda
        // y a construir un array con sus ids ($resultado)
        foreach ($items as $item_id => $value) {//item_id es la key y value son los valores de los input
            $valores = array();
            if(!blank($value)){
                $countItems++;
                $sql = "SELECT DISTINCT productos.id
                FROM productos
                INNER JOIN items_productos ON productos.id = items_productos.productos_id
                WHERE productos.categoria_id = '$idCategoria'";
                $sql = $sql . " AND items_productos.items_id = '$item_id'
                                AND items_productos.value LIKE '%$value%'";
                
                $valores = DB::select(DB::raw($sql));
            }
            
            //Este foreach se encarga de guardar todos los array dentro de uno solo
            foreach($valores as $valor){
                array_push($productos_ids, $valor);
            }
        }
        
        for($i = 0; $i<$max_producto_id; $i++) {
            $aux[$i] = 0;
        }
        foreach ($productos_ids as $producto) {
            $aux[$producto->id] = $aux[$producto->id] + 1;
        }
        $resultadoFinal = array();
        $aux_ids = array();
        for($i = 0; $i<$max_producto_id; $i++) {
            if ($aux[$i] == $contador) {
                $producto = Productos::find($i);
                $resultadoFinal[] = $producto;
                $aux_ids[] = $producto->id;
            }
        }
        $productos = Productos::whereIn('id', $aux_ids);
        return $productos;
    }
}
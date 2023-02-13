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
        return $this->belongsToMany('App\Models\Items')->withPivot('value');
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
        else $resultadoBusqueda = Productos::where("productos.name", "like", "%$textoBusqueda%")->paginate(2);  
        return $resultadoBusqueda->appends(['textoBusqueda' => $textoBusqueda]);
    }

    public static function busquedaCampos($idCategoria, $items){
        $listaCategorias = Categorias::find($idCategoria);
        $resultadoBusqueda = Productos::select('productos.id', 'productos.name','productos.image');
        ->join("items_productos", "productos.id", "items_productos.productos_id")
        ->where("productos.categoria_id", $idCategoria)
        foreach ($items as $item) {
            $resultadoBusqueda->where($items like )
        }
    }
}
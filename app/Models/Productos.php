<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{

    protected $fillable = ["name", "remarks", "dimensions", "image", "categoria_id"];


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

    public function recuperarProductosFront(){
        $listaCategorias = Categories::all();
        $lsitaProductos = array();
        foreach ($listaCategorias as $categoria) {
            $numProd = Productos::count("id_cat = $categoria->id");
            $aleat = random(1, $numProd);
            $listaProductos[] = Productos::consultar_aleatoriamente_un_producto_de($categoria->id)  // SELECT * FROM productos WHERE cat='' LIMIT 1, $aleat
        }
        return $listaProductos;
    }
}

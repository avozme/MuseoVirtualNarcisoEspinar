<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{

    protected $fillable = ["name", "description", "dimensions", "collection", "technique", "image", "categoria_id"];


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
        return $this->hasMany('App\Models\Imagenes');
        }
        use HasFactory;

    //public function recuperarProductosFront(){
    //
   // }
}

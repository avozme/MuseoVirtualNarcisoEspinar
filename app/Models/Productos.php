<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public function categoria() {
        return $this->belongsTo('App\Models\Categorias');
        }
    use HasFactory;
}

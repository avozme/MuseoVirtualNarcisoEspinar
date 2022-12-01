<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public function productos() {
        return $this->hasMany('App\Models\Productos');
        }

    public function items() {
        return $this->hasMany('App\Models\Items');
        }
    use HasFactory;
}

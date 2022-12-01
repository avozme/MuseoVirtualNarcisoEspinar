<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    public function categoria() {
        return $this->belongsTo('App\Models\Categorias', 'Categorias_id');
        }

    use HasFactory;
}

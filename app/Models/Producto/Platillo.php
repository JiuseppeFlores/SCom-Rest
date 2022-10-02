<?php

namespace App\Models\Producto;

use App\Models\Ingrediente\Ingrediente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;
    protected $table = 'platillo';
    protected $primaryKey = 'idproducto';
    public $incrementing = false;
    public $timestamps = false;

    public function producto(){
        return $this->belongsTo(Producto::class,'idproducto','idproducto');
    }

    public function ingredientes(){
       // return $this->hasMany(Ingrediente::class,'idproducto');
       return $this->belongsToMany(Ingrediente::class, 'tiene','idproducto','codingrediente');
    }
}
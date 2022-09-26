<?php

namespace App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;
    protected $table = 'bebida';
    protected $primaryKey = 'idproducto';
    public $incrementing = false;
    public $timestamps = false;
}
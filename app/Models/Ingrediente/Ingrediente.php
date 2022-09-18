<?php

namespace App\Models\Ingrediente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingrediente extends Model
{
    use HasFactory;
    protected $table = 'ingrediente';
    protected $primaryKey = 'codIngrediente';
    public $incrementing = false;
    public $timestamps = false;
}

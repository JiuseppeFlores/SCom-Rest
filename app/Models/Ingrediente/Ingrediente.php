<?php

namespace App\Models\Ingrediente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;
    protected $table = 'ingrediente';
    protected $primaryKey = 'codingrediente';
    public $incrementing = true;
    public $timestamps = false;
}

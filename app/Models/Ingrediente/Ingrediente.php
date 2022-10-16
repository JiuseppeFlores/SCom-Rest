<?php

namespace App\Models\Ingrediente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ingrediente extends Model
{
    use HasFactory;
    protected $table = 'ingrediente';
    protected $primaryKey = 'codingrediente';
    public $incrementing = true;
    public $timestamps = false;

    //Relacion muchos a muchos

    public function solicita(){
        return $this->belongsToMany(DB::table('solicita'),'codIngrediente','codIngrediente');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cajero;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'ci';
    public $incrementing = false;
    public $timestamps = false;

    public function cajero(){
        return $this->belongsTo(Cajero::class,'ciCajeroAdiciona','ci');
    }
}

<?php

namespace App\Models\Opinion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;
    protected $table = 'Opinion';
    protected $primaryKey = 'idOpinion';
    public $incrementing = true;
    public $timestamps = false;
}
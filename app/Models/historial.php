<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;
    protected $table = 'historials';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'nombre_completo',
        'edad',
        'created_at',
        'updated_at'
    ];
}

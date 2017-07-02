<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $table = "categoria";
    
    protected $dates = ['deleted_at'];

    protected $fillable = ['descripcion'];

    public function producto()
    {
        return $this->belongsTo(Producto::class,'idcategoria','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use SoftDeletes;

    protected $table = "marca";

    protected $date = ['deleted_at'];

    protected $fillable = ['descripcion'];

    public function FunctionName()
    {
        return $this->belongsTo(Producto::class,'idmarca','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = "producto";

    protected $date = ['deleted_at'];

    protected $fillable = ['idcategoria','idmarca','codigo','slug','titulo','descripcion','precio_compra','precio_venta','stock','fecha_compra','imagen1','imagen2','imagen3','imagen4'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class,'id','idcategoria');
    }

    public function marca()
    {
        return $this->hasOne(Marca::class,'id','idmarca');
    }
}

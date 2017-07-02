<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo'        => 'required|min:4',
            'titulo'        => 'required|unique:producto',
            'descripcion'   => 'required|min:10',
            'stock'         => 'required',
            'precio_compra' => 'required',
            'precio_venta'  => 'required',
            'fecha_compra'  => 'required',
            'imagen1'       => 'mimes:jpeg,bmp,png,jpg',
            'imagen2'       => 'mimes:jpeg,bmp,png,jpg',
            'imagen3'       => 'mimes:jpeg,bmp,png,jpg',
            'imagen4'       => 'mimes:jpeg,bmp,png,jpg'
        ];
    }
}

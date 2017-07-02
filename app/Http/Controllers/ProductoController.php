<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos  = Producto::with(['categoria','marca'])->get();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas     = Marca::pluck('descripcion','id');
        $categorias = Categoria::pluck('descripcion','id');
        return view('admin.productos.registro', compact(['categorias','marcas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $imagen1 = $request->file('imagen1');
        $nombre1 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen1->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen1')->move('storage',$nombre1);

        $imagen2 = $request->file('imagen2');
        $nombre2 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen2->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen2')->move('storage',$nombre2);

        $imagen3 = $request->file('imagen3');
        $nombre3 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen3->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen3')->move('storage',$nombre3);

        $imagen4 = $request->file('imagen4');
        $nombre4 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen4->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen4')->move('storage',$nombre4);
        
        $data = new Producto();
        $data->idcategoria      = $request->idcategoria;
        $data->idmarca          = $request->idmarca;
        $data->codigo           = $request->codigo;
        $data->stock            = $request->stock;
        $data->slug             = Str::slug($request->titulo);
        $data->titulo           = $request->titulo;
        $data->descripcion      = $request->descripcion;
        $data->precio_compra    = $request->precio_compra;
        $data->precio_venta     = $request->precio_venta;
        $data->fecha_compra     = $request->fecha_compra;
        $data->imagen1          = $nombre1;
        $data->imagen2          = $nombre2;
        $data->imagen3          = $nombre3;
        $data->imagen4          = $nombre4;
        $data->save();

        return redirect('productos')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Se registro nuevo Producto.</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::findOrFail($id);
        $marcas     = Marca::pluck('descripcion','id');
        $categorias = Categoria::pluck('descripcion','id');
        return view('admin.productos.editar', compact(['productos', 'marcas', 'categorias']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {/*
        $imagen1 = $request->file('imagen1');
        $nombre1 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen1->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen1')->move('storage',$nombre1);

        $imagen2 = $request->file('imagen2');
        $nombre2 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen2->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen2')->move('storage',$nombre2);

        $imagen3 = $request->file('imagen3');
        $nombre3 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen3->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen3')->move('storage',$nombre3);

        $imagen4 = $request->file('imagen4');
        $nombre4 = date("Y-m-d-h-i-s").'-1.'.pathinfo($imagen4->getClientOriginalName(), PATHINFO_EXTENSION);
        $request->file('imagen4')->move('storage',$nombre4);
        
        $data = new Producto();
        $data->idcategoria      = $request->idcategoria;
        $data->idmarca          = $request->idmarca;
        $data->codigo           = $request->codigo;
        $data->stock            = $request->stock;
        $data->slug             = Str::slug($request->titulo);
        $data->titulo           = $request->titulo;
        $data->descripcion      = $request->descripcion;
        $data->precio_compra    = $request->precio_compra;
        $data->precio_venta     = $request->precio_venta;
        $data->fecha_compra     = $request->fecha_compra;
        $data->imagen1          = $nombre1;
        $data->imagen2          = $nombre2;
        $data->imagen3          = $nombre3;
        $data->imagen4          = $nombre4;
        $data->save();

        return redirect('productos')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Producto Actualizado.</div>');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

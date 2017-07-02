@extends('layouts.layout')

@section('css-style')
{!! Html::style('css/lib/summernote/summernote.css') !!}
{!! Html::style('css/separate/pages/editor.min.css') !!}
{!! Html::style('css/separate/vendor/bootstrap-daterangepicker.min.css') !!}
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <h2>ACTUALIZAR PRODUCTO</h2>

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! $error !!}
                </div>
            @endforeach

            
            
            {!! Form::model($productos, ['url' => 'productos/'.$productos->id, 'method' => 'PUT', 'files' => true]) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    {!! Form::label('MARCA *') !!}
                    {!! Form::select('idmarca',$marcas,null,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    {!! Form::label('CATEGORIA *') !!}
                    {!! Form::select('idcategoria',$categorias,null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    {!! Form::label('CODIGO *') !!}
                    {!! Form::text('codigo',null,['id' => 'codigo', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    {!! Form::label('TITULO *') !!}
                    {!! Form::text('titulo',null,['id' => 'titulo', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    {!! Form::label('STOCK *') !!}
                    {!! Form::text('stock',null,['id' => 'stock', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="summernote-theme-1">
                    {!! Form::label('DESCRIPCION *') !!}
                    {!! Form::textArea('descripcion',null,['id' => 'descripcion', 'class' => 'summernote']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    {!! Form::label('PRECIO COMPRA *') !!}
                    {!! Form::text('precio_compra',null,['id' => 'precio_compra', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    {!! Form::label('PRECIO VENTA *') !!}
                    {!! Form::text('precio_venta',null,['id' => 'precio_venta', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    {!! Form::label('FECHA COMPRA *') !!}
                    {!! Form::text('fecha_compra',null,['id' => 'fecha_compra', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    <img src="{!! storage_path('2017-06-30-02-50-32-1.jpg') !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 2 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control" value="{!! $productos->imagen2 !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 3 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control" value="{!! $productos->imagen3 !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 4 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control" value="{!! $productos->imagen4 !!}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 1 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 2 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control" value="{!! $productos->imagen2 !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 3 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control" value="{!! $productos->imagen3 !!}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 4 *') !!}
                    <input type="file" name="imagen1" id="imagen1" class="form-control" value="{!! $productos->imagen4 !!}">
                    </div>
                </div>
            </div>

            <div class="form-group">
            {!! Form::submit('REGISTRAR',['class' => 'btn btn-primary']) !!}
            <a href="{!! url('productos') !!}" class="btn btn-success">ATRAS</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('js-script')
{!! Html::script('js/lib/summernote/summernote.min.js') !!}
{!! Html::script('js/lib/moment/moment-with-locales.min.js') !!}
{!! Html::script('js/lib/daterangepicker/daterangepicker.js') !!}
<script>
	$(document).ready(function() {
		$('.summernote').summernote();

        $('#fecha_compra').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true
		});
	});
</script>
@stop

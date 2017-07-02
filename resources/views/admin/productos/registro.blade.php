@extends('layouts.layout')

@section('css-style')
{!! Html::style('css/lib/summernote/summernote.css') !!}
{!! Html::style('css/separate/pages/editor.min.css') !!}
{!! Html::style('css/separate/vendor/bootstrap-daterangepicker.min.css') !!}
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <h2>NUEVO PRODUCTO</h2>

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! $error !!}
                </div>
            @endforeach

            
            
            {!! Form::open(['url' => 'productos', 'method' => 'post', 'files' => true]) !!}

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
                    {!! Form::label('IMAGEN 1 *') !!}
                    {!! Form::file('imagen11',['id' => 'imagen1', 'class' => 'form-control', 'value' => 'hola']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 2 *') !!}
                    {!! Form::file('imagen22',['id' => 'imagen2', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 3 *') !!}
                    {!! Form::file('imagen33',['id' => 'imagen3', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    {!! Form::label('IMAGEN 4 *') !!}
                    {!! Form::file('imagen44',['id' => 'imagen4', 'class' => 'form-control']) !!}
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

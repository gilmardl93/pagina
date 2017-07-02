@extends('layouts.layout')

@section('css-style')
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <h2>ACTUALIZAR CATEGORIA</h2>

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! $error !!}
                </div>
            @endforeach
            
            {!! Form::model($categorias,['url' => 'categorias/'.$categorias->id, 'method' => 'PUT']) !!}

            <div class="form-group">
            {!! Form::label('DESCRIPCION *') !!}
            {!! Form::text('descripcion',null,['id' => 'descripcion', 'class' => 'form-control']) !!}
            </div>
            

            <div class="form-group">
            {!! Form::submit('REGISTRAR',['class' => 'btn btn-primary']) !!}
            <a href="{!! url('categorias') !!}" class="btn btn-success">ATRAS</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

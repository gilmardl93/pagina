@extends('layouts.layout')

@section('css-style')
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <div id="alert"></div>
            <br>
            <h2>EDITAR USUARIO</h2>
            
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{!! $error !!}</div>
            @endforeach

            {!! Form::open(['url' => 'update-user', 'method' => 'post']) !!}
            @foreach($users as $row)

            <input type="hidden" name="id" id="id" value="{!! $row->id !!}">

            <div class="form-group">
            {!! Form::label('NOMBRES *') !!}
            {!! Form::text('nombres',$row->nombres,['id' => 'nombres', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('PATERNO *') !!}
            {!! Form::text('paterno',$row->paterno,['id' => 'paterno', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('MATERNO *') !!}
            {!! Form::text('materno',$row->materno,['id' => 'materno', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('EMAIL *') !!}
            {!! Form::text('email',$row->email,['id' => 'email', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::submit('ACTUALIZAR',['class' => 'btn btn-primary']) !!}
            <a href="{!! url('usuarios') !!}" class="btn btn-success">ATRAS</a>
            </div>

            @endforeach
            {!! Form::close() !!}
        </div>
    </div>
@endsection

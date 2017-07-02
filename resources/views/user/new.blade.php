@extends('layouts.layout')

@section('css-style')
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <h2>NUEVO USUARIO</h2>

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{!! $error !!}</div>
            @endforeach
            
            {!! Form::open(['url' => 'new-user', 'method' => 'post']) !!}

            <div class="form-group">
            {!! Form::label('USUARIO *') !!}
            {!! Form::text('username',null,['id' => 'username', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('CONTRASEÑA *') !!}
            {!! Form::password('password',['id' => 'password', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('NOMBRES *') !!}
            {!! Form::text('nombres',null,['id' => 'nombres', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('PATERNO *') !!}
            {!! Form::text('paterno',null,['id' => 'paterno', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('MATERNO *') !!}
            {!! Form::text('materno',null,['id' => 'materno', 'class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
            {!! Form::label('EMAIL *') !!}
            {!! Form::text('email',null,['id' => 'email', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::submit('REGISTRAR',['class' => 'btn btn-primary']) !!}
            <a href="{!! url('usuarios') !!}" class="btn btn-success">ATRAS</a>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@extends('layouts.layout')

@section('css-style')
{!! Html::style('css/lib/datatables-net/datatables.min.css') !!}
{!! Html::style('css/separate/vendor/datatables-net.min.css') !!}
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <a href="{!! url('productos/create') !!}" class="btn btn-primary">NUEVO</a><p></p>
			
			{!! Session::get('message') !!}

			<table id="productos" class="display table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>CODIGO</th>
	    				<th>TITULO</th>
						<th>CATEGORIA</th>
						<th>MARCA</th>
						<th>PRECIO DE COMPRA</th>
						<th>PRECIO DE VENTA</th>
						<th>MAS +</th>
						<th>ELIMINAR</th>
						<th>ACTUALIZAR</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($productos as $row)
					<tr>
						<td>{!! $row->codigo !!}</td>
						<td>{!! $row->titulo !!}</td>
						<td>{!! $row->categoria->descripcion !!}</td>
						<td>{!! $row->marca->descripcion !!}</td>
						<td>{!! $row->precio_compra !!}</td>
						<td>{!! $row->precio_venta !!}</td>
						<td>
							{!! Form::open(['url' => 'productos/'.$row->id, 'method' => 'GET']) !!}
							{!! Form::submit('VER MAS',['class' => 'btn btn-info']) !!}
							{!! Form::close() !!}
						</td>
						<td>
							{!! Form::open(['url' => 'productos/'.$row->id, 'method' => 'DELETE']) !!}
							{!! Form::submit('ELIMINAR',['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}							
						</td>
						<td>
							{!! Form::open(['url' => 'productos/'.$row->id.'/edit', 'method' => 'GET']) !!}
							{!! Form::submit('ACTUALIZAR',['class' => 'btn btn-info']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
                   @endforeach
                </tbody>
			</table>
        </div>
    </section>
@endsection

@section('js-script')
{!! Html::script('js/lib/datatables-net/datatables.min.js') !!}
	<script>
		$(function() {
			$('#productos').DataTable();
		});
	</script>
@stop
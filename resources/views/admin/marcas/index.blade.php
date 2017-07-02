@extends('layouts.layout')

@section('css-style')
{!! Html::style('css/lib/datatables-net/datatables.min.css') !!}
{!! Html::style('css/separate/vendor/datatables-net.min.css') !!}
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <a href="{!! url('marcas/create') !!}" class="btn btn-primary">NUEVO</a><p></p>
			
			{!! Session::get('message') !!}

			<table id="marcas" class="display table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
	    				<th>DESCRIPCION</th>
						<th>ELIMINAR</th>
						<th>ACTUALIZAR</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($marcas as $row)
					<tr>
						<td>{!! $row->descripcion !!}</td>
						<td>
							{!! Form::open(['url' => 'marcas/'.$row->id, 'method' => 'DELETE']) !!}
							{!! Form::submit('ELIMINAR',['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}							
						</td>
						<td>
							{!! Form::open(['url' => 'marcas/'.$row->id.'/edit', 'method' => 'GET']) !!}
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
			$('#marcas').DataTable();
		});
	</script>
@stop
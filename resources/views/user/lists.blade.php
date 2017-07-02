@extends('layouts.layout')

@section('css-style')
{!! Html::style('css/lib/datatables-net/datatables.min.css') !!}
{!! Html::style('css/separate/vendor/datatables-net.min.css') !!}
@stop

@section('admin')
    <section class="card">
		<div class="card-block">
            <a href="{!! url('nuevo-usuario') !!}" class="btn btn-primary">NUEVO</a><p></p>
			
			{!! Session::get('message') !!}

			<table id="usuarios" class="display table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
	    				<th>Usuario</th>
						<th>Nombres</th>
						<th>Paterno</th>
						<th>Materno</th>
						<th>EMAIL</th>
						<th>ACCION</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($users as $row)
					<tr>
						<td>{!! $row->username !!}</td>
						<td>{!! $row->nombres !!}</td>
						<td>{!! $row->paterno !!}</td>
						<td>{!! $row->materno !!}</td>
						<td>{!! $row->email !!}</td>
						<td>
							<a class="btn btn-danger" href="{!! url('delete-user/'.$row->id) !!}">ELIMINAR</a>
							<a class="btn btn-info" href="{!! url('edit-user/'.$row->id) !!}">EDITAR</a>
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
			$('#usuarios').DataTable();
		});
	</script>
@stop
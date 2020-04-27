@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')

<section  id="contenido_principal">
<div class="box box-primary box-white">
    <div class="box-header with-border bg-primary">
        <h3 class="box-title">Listado Encuesta Densidad</h3>
        <div class="box-tools pull-right">
            <a href="{{}}" class="btn btn-block btn-default btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Nueva Encuesta
            </a>
        </div>
    </div>

<div class="box-body box-white">
    <div class="table-responsive" >
	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
			<thead>
				<tr>    
					<th>#</th>
					<th>Año</th>
					<th>Fecha de Registro</th>
					<th>Acción</th>
				</tr>
			</thead>
	    <tbody>

		@foreach ($datos as $key => $dato)
		 <tr role="row" class="odd">
			<td>das</td>
			<td>das</td>
			<td>das</td>
			<td>das</td>
			{{-- <td>{{ $dato->ano }}</td> --}}
			{{-- <td>{{ $dato->created_at }}</td>
			<td>
			<button type="button" class="btn  btn-default btn-xs" onclick="verinfo_usuario({{  $dato->id }}, 1)" ><i class="fa fa-fw fa-edit"></i></button>
			<button type="button"  class="btn  btn-danger btn-xs"  onclick="borrado_usuario({{  $dato->id }});"  ><i class="fa fa-fw fa-remove"></i></button>
			</td> --}}
		</tr> 
	    @endforeach



		</tbody>
		</table>

	</div>
</div>

{{-- {{ $usuarios->links() }}

@if(count($usuarios)==0) --}}


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... no se encontraron resultados para su busqueda...
</label> 

</div>

 </div> 

{{-- @endif --}}

</div></section>
@endsection
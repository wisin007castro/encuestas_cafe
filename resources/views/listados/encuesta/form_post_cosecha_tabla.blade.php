@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')

<section  id="contenido_principal">
<div class="col-md-2">
</div>
<div class="col-md-8">
	<div class="myform-top">
		<div class="myform-top-left">
			<h3>Post Cosecha</h3>
		</div>

	 </div>
    <div class="box-header with-border bg-primary">
        <h3 class="box-title">Respuestas Anteriores</h3>
        <div class="box-tools pull-right">
		<a href="{{route('form_post_cosecha_agregar')}}" class="btn btn-block btn-success btn-sm">
                <i class="fa fa-fw fa-plus-circle"></i> Nueva Respuesta
            </a>
        </div>
    </div>

<div class="box-body box-white">
    <div class="table-responsive" >
	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Fecha de Respuesta</th>
					<th>Acción</th>
				</tr>
			</thead>
	    <tbody>

		@foreach ($datos as $key => $dato)
		@php
			$id_post_cosecha_encode = base64_encode($dato->id_post_cosecha)
		@endphp
		 <tr role="row" class="odd">
			<td>{{ $key + 1 }}</td>
			<td>{{ f_formato($dato->updated_at) }}</td>
			<td>
				<a href="{{route('form_post_cosecha_editar', ['id_post_cosecha' => $id_post_cosecha_encode])}}" class="btn-accion-tabla">
					<i class="fa fa-fw fa-edit"></i>
				</a>
			{{-- <button type="button" class="btn  btn-default btn-xs" onclick="verinfo_usuario({{  $dato->id_densidad }}, 1)" ><i class="fa fa-fw fa-edit"></i></button> --}}
			{{-- <button type="button"  class="btn  btn-danger btn-xs"  onclick="borrado_usuario({{  $dato->id_densidad }});"  ><i class="fa fa-fw fa-remove"></i></button> --}}
			</td>
		</tr>
	    @endforeach



		</tbody>
		</table>

	</div>
</div>

{{-- {{ $usuarios->links() }} --}}

@if(count($datos)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:10px; text-align: center">

<label style='color:#177F6B'>
              ... No se encontraron respuestas anteriores ...
</label>

</div>

 </div>

@endif

</div></section>
@endsection

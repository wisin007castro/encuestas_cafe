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
			<h3>Podas</h3>
		</div>

	 </div>
    <div class="box-header with-border bg-primary">
        <h3 class="box-title">Respuestas Anteriores</h3>
        <div class="box-tools pull-right">
		<a href="{{route('form_podas_agregar')}}" class="btn btn-block btn-success btn-sm">
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
					<th>Formación de Planta</th>
					<th>Mantenimiento</th>
					<th>Sel. Brotes</th>
					<th>Rehabilitación</th>
					<th>Renovación</th>
					<th>Deshoje y Despunte</th>
					<th>Acción</th>
				</tr>
			</thead>
	    <tbody>
		@foreach ($datos as $key => $dato)
		@php
			$id_poda = base64_encode($dato->id_poda)
		@endphp
		 <tr role="row" class="odd">
			<td>{{ $key + 1 }}</td>
			<td>{{ f_formato($dato->updated_at) }}</td>
			<td>{{ $dato->form_planta == 1 ? 'SI' : 'NO'}}
			@if ($dato->form_planta_foto)
				<a href="#modal_ver_fotografia" data-id="{{$dato->form_planta_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
					<i class="fa fa-fw fa-file-image-o"></i> 
				</a>
			@endif
			</td>
			<td>{{ $dato->mantenimiento == 1 ? 'SI' : 'NO'}}
			@if ($dato->mantenimiento_foto)
				<a href="#modal_ver_fotografia" data-id="{{$dato->mantenimiento_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
					<i class="fa fa-fw fa-file-image-o"></i> 
				</a>
			@endif
			</td>
			<td>{{ $dato->sel_brotes == 1 ? 'SI' : 'NO'}}
			@if ($dato->sel_brotes_foto)
				<a href="#modal_ver_fotografia" data-id="{{$dato->sel_brotes_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
					<i class="fa fa-fw fa-file-image-o"></i> 
				</a>
			@endif
			</td>
			<td>{{ $dato->rehabilitacion == 1 ? 'SI' : 'NO'}}
			@if ($dato->rehabilitacion_foto)
				<a href="#modal_ver_fotografia" data-id="{{$dato->rehabilitacion_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
					<i class="fa fa-fw fa-file-image-o"></i> 
				</a>
			@endif
			</td>
			<td>{{ $dato->renovacion == 1 ? 'SI' : 'NO'}}
			@if ($dato->renovacion_foto)
				<a href="#modal_ver_fotografia" data-id="{{$dato->renovacion_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
					<i class="fa fa-fw fa-file-image-o"></i> 
				</a>
			@endif
			</td>
			<td>{{ $dato->deshoje_despunte == 1 ? 'SI' : 'NO'}}
			@if ($dato->deshoje_despunte_foto)
				<a href="#modal_ver_fotografia" data-id="{{$dato->deshoje_despunte_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
					<i class="fa fa-fw fa-file-image-o"></i> 
				</a>
			@endif
			</td>
			<td>
				<a href="{{route('form_podas_editar', ['id_poda' => $id_poda])}}" class="btn-accion-tabla">
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

<div class="modal fade" id="modal_ver_fotografia" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Fotografía</h4>
            </div>
            <div class="modal-body">
				<img id="foto" class="img-responsive" src="" alt="">
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@parent
<script type="text/javascript">
  $(document).on("click", ".abrirModal", function () {
		// console.log('Ok');
		var foto = $(this).data('id');
		$(".modal-body #foto").attr("src", foto);
	});
</script>

@endsection

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
			<h3>Deficiencias</h3>
		</div>

	 </div>
    <div class="box-header with-border bg-primary">
        <h3 class="box-title">Respuestas Anteriores</h3>
        <div class="box-tools pull-right">
						<a href="{{route('form_deficiencias_agregar')}}" class="btn btn-block btn-success btn-sm">
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
					<th>P</th>
					<th>K</th>
					<th>Ca</th>
					<th>Mg</th>
					<th>S</th>
					<th>Fe</th>
					<th>Zc</th>
					<th>Cu</th>
					<th>B</th>
					<th>Acción</th>
				</tr>
			</thead>
	    <tbody>

		@foreach ($datos as $key => $dato)
		@php
			$id_deficiencia_encode = base64_encode($dato->id_deficiencia)
		@endphp
		 <tr role="row" class="odd">
			<td>{{ $key + 1 }}</td>
			<td>{{ f_formato($dato->updated_at) }}</td>
			<td>{{ $dato->p == 1 ? 'SI' : 'NO'}}
				@if ($dato->p_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->p_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->k == 1 ? 'SI' : 'NO'}}
				@if ($dato->k_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->k_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->ca == 1 ? 'SI' : 'NO'}}
				@if ($dato->ca_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->ca_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->mg == 1 ? 'SI' : 'NO'}}
				@if ($dato->mg_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->mg_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->s == 1 ? 'SI' : 'NO'}}
				@if ($dato->s_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->s_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->fe == 1 ? 'SI' : 'NO'}}
				@if ($dato->fe_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->fe_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->zc == 1 ? 'SI' : 'NO'}}
				@if ($dato->zc_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->zc_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->cu == 1 ? 'SI' : 'NO'}}
				@if ($dato->cu_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->cu_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>{{ $dato->b == 1 ? 'SI' : 'NO'}}
				@if ($dato->b_foto)
					<a href="#modal_ver_fotografia" data-id="{{$dato->b_foto}}" data-toggle="modal" class="abrirModal btn btn-default btn-sm">
						<i class="fa fa-fw fa-file-image-o"></i>
					</a>
				@endif
			</td>
			<td>
				<a href="{{route('form_deficiencias_editar', ['id_deficiencia' => $id_deficiencia_encode])}}" class="btn-accion-tabla">
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
		var foto = $(this).data('id');
		$(".modal-body #foto").attr("src", foto);
	});
</script>

@endsection

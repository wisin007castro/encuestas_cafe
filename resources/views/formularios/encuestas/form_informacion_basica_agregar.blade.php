@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
<section  id="contenido_principal">
<section  id="content">

    <div class="" >
        <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >

                 <div class="myform-top">
                    <div class="myform-top-left">
                       {{-- <img  src="" class="img-responsive logo" /> --}}
                      <h3>Información básica</h3>
                        <p>Por favor introduzca sus datos</p>
                    </div>
                    <div class="myform-top-right">
                      <i class="fa fa-user"></i>
                    </div>
                  </div>

                  <div class="col-md-12" >
                    @if (count($errors) > 0)

                        <div class="alert alert-danger">
                            <strong>UPPS!</strong> Error al Registrar<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                   </div  >

                    <div id="div_notificacion_sol" class="myform-bottom">

                    <form action="{{ route('informacion_basica_guardar') }}"  method="post" class="" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<br>
												<div class="form-group">
													<label >Nombres del productor</label>
													<input type="text" name="productor_nombres" class="form-control" required/ >
												</div>

												<div class="form-group">
													<label >Apellido paterno del productor</label>
													<input type="text" name="productor_paterno" class="form-control"/ >
												</div>

												<div class="form-group">
													<label >Apellido materno del productor</label>
													<input type="text" name="productor_materno" class="form-control"/ >
												</div>

												<div class="form-group">
													<label >Cédula de Identidad del productor</label>
													<input type="number" min="0" step="1" name="productor_ci" class="form-control" required/ >
												</div>

                        <div class="form-group">
                          <label >Sexo del productor</label>
													<br>
                          <input type="radio" name="productor_sexo" value="Masculino" checked=""> Masculino
													<br>
                          <input type="radio" name="productor_sexo" value="Femenino"> Femenino
                        </div>

												<div class="form-group">
													<label >Número de teléfono del productor</label>
													<input type="number" min="0" step="1" name="productor_telefono" class="form-control" required/ >
												</div>

                        <div class="form-group">
                          <label >Tipo de Cultivo</label>
													<br>
													<input type="radio" name="tipo_cultivo" value="Cafe" checked=""> Café
													<br>
													<input type="radio" name="tipo_cultivo" value="Cacao"> Cacao
                        </div>

												<div class="form-group">
													<label>Departamento</label>
													<select class="form-control select2" name="id_departamento" id="id_departamento" onchange="cambia_departamento()" required>
														<option value=""> --- Seleccione un departamento --- </option>
														@foreach ($departamentos as $departamento)
															<option value={{$departamento->id_departamento}}>{{$departamento->departamento}}</option>
														@endforeach
													</select>
												</div>

												<div class="form-group">
													<div class="form-group provincia_json_select">
															<label class="">Provincia</label>
															<select class="form-control select2" name="id_provincia" id="id_provincia" onchange="cambia_provincia()" required>
															</select>
													</div>
												</div>

												<div class="form-group">
													<div class="form-group municipio_json_select">
															<label class="">Municipio</label>
															<select class="form-control select2" name="id_municipio" id="id_municipio" required>
															</select>
													</div>
												</div>

												<br>
                        <button type="submit" class="mybtn">Guardar</button>
                      </form>

                    </div>
              </div>
            </div>
        </div>
      </div>

</section>

</section>
@endsection

@section('scripts')

@parent
<script>
function cambia_departamento(){
	//Borramos el contenido del select
	$(".provincia_json_select select").html("");
	//Tomamos el id del departamento seleccionado
	var id_departamento = $("#id_departamento").val();
	//Obtenemos las provincias del departamento seleccionado y los agregamos al select
	$.getJSON("consultaProvincias/"+id_departamento+"",{},function(objetosretorna){
			$("#error").html("");
			var TamanoArray = objetosretorna.length;
			$(".provincia_json_select select").append('<option value=""> --- Seleccione una provincia --- </option>');
			$.each(objetosretorna, function(i,value){
					$(".provincia_json_select select").append('<option value="'+value.id_provincia+'">'+value.provincia+'</option>');
			});
	});
};


function cambia_provincia(){
	//Borramos el contenido del select
	$(".municipio_json_select select").html("");
	//Tomamos el id del provincia seleccionado
	var id_provincia = $("#id_provincia").val();
	//Obtenemos los municipios de la provincia seleccionado y los agregamos al select
	$.getJSON("consultaMunicipios/"+id_provincia+"",{},function(objetosretorna){
			$("#error").html("");
			var TamanoArray = objetosretorna.length;
			$(".municipio_json_select select").append('<option value=""> --- Seleccione un municipio --- </option>');
			$.each(objetosretorna, function(i,value){
					$(".municipio_json_select select").append('<option value="'+value.id_municipio+'">'+value.municipio+'</option>');
			});
	});
};
</script>

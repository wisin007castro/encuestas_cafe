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
                      <h3>Plagas de Cultivo de Café</h3>
                        <p>Por favor responda las siguientes preguntas (Editando)</p>
                    </div>
                    <div class="myform-top-right">
                      <i class="fa fa-edit"></i>
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

                    <form action="{{ route('plagas_actualizar', ['id' => $dato->id_plaga]) }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<br>
												<h4 style="color:white">Plaga: Broca</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Broca?</label>
													<br>
													<input type="radio" id="broca_si" name="broca" value="1" onchange="mostrar_broca()" <?php if ($dato->broca==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="broca_no" name="broca" value="0" onchange="mostrar_broca()" <?php if ($dato->broca==0){echo "checked";}?>> No
												</div>

												<div class="content_broca" id="content_broca">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="broca_fecha" id="broca_fecha" class="form-control" value="{{old('broca_fecha', $dato->broca_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="broca_zona_afectada[]" id="broca_zona_afectada" multiple="broca_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->broca_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->broca_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->broca_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->broca_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="broca_incidencia" id="broca_incidencia" class="form-control" value="{{old('broca_incidencia', $dato->broca_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="broca_control" id="broca_control" class="form-control" value="{{old('broca_control', $dato->broca_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Plaga: Cepe</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Cepe?</label>
													<br>
													<input type="radio" id="cepe_si" name="cepe" value="1" onchange="mostrar_cepe()" <?php if ($dato->cepe==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="cepe_no" name="cepe" value="0" onchange="mostrar_cepe()" <?php if ($dato->cepe==0){echo "checked";}?>> No
												</div>

												<div class="content_cepe" id="content_cepe">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="cepe_fecha" id="cepe_fecha" class="form-control" value="{{old('cepe_fecha', $dato->cepe_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="cepe_zona_afectada[]" id="cepe_zona_afectada" multiple="cepe_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->cepe_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->cepe_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->cepe_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->cepe_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="cepe_incidencia" id="cepe_incidencia" class="form-control" value="{{old('cepe_incidencia', $dato->cepe_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="cepe_control" id="cepe_control" class="form-control" value="{{old('cepe_control', $dato->cepe_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Plaga: Grillo (Tucura)</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Grillo (Tucura)?</label>
													<br>
													<input type="radio" id="grillo_si" name="grillo" value="1" onchange="mostrar_grillo()" <?php if ($dato->grillo==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="grillo_no" name="grillo" value="0" onchange="mostrar_grillo()" <?php if ($dato->grillo==0){echo "checked";}?>> No
												</div>

												<div class="content_grillo" id="content_grillo">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="grillo_fecha" id="grillo_fecha" class="form-control" value="{{old('grillo_fecha', $dato->grillo_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="grillo_zona_afectada[]" id="grillo_zona_afectada" multiple="grillo_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->grillo_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->grillo_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->grillo_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->grillo_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="grillo_incidencia" id="grillo_incidencia" class="form-control" value="{{old('grillo_incidencia', $dato->grillo_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="grillo_control" id="grillo_control" class="form-control" value="{{old('grillo_control', $dato->grillo_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Plaga: Cochinilla (Frutos)</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Cochinilla (Frutos)?</label>
													<br>
													<input type="radio" id="cochinilla_si" name="cochinilla" value="1" onchange="mostrar_cochinilla()" <?php if ($dato->cochinilla==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="cochinilla_no" name="cochinilla" value="0" onchange="mostrar_cochinilla()" <?php if ($dato->cochinilla==0){echo "checked";}?>> No
												</div>

												<div class="content_cochinilla" id="content_cochinilla">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="cochinilla_fecha" id="cochinilla_fecha" class="form-control" value="{{old('cochinilla_fecha', $dato->cochinilla_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="cochinilla_zona_afectada[]" id="cochinilla_zona_afectada" multiple="cochinilla_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->cochinilla_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->cochinilla_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->cochinilla_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->cochinilla_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="cochinilla_incidencia" id="cochinilla_incidencia" class="form-control" value="{{old('cochinilla_incidencia', $dato->cochinilla_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="cochinilla_control" id="cochinilla_control" class="form-control" value="{{old('cochinilla_control', $dato->cochinilla_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Plaga: Escamas  del Cafe (hojas, tallo y brotes nuevos)</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Escamas  del Cafe (hojas, tallo y brotes nuevos)?</label>
													<br>
													<input type="radio" id="escamas_si" name="escamas" value="1" onchange="mostrar_escamas()" <?php if ($dato->escamas==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="escamas_no" name="escamas" value="0" onchange="mostrar_escamas()" <?php if ($dato->escamas==0){echo "checked";}?>> No
												</div>

												<div class="content_escamas" id="content_escamas">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="escamas_fecha" id="escamas_fecha" class="form-control" value="{{old('escamas_fecha', $dato->escamas_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="escamas_zona_afectada[]" id="escamas_zona_afectada" multiple="escamas_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->escamas_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->escamas_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->escamas_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->escamas_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="escamas_incidencia" id="escamas_incidencia" class="form-control" value="{{old('escamas_incidencia', $dato->escamas_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="escamas_control" id="escamas_control" class="form-control" value="{{old('escamas_control', $dato->escamas_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Plaga: Minador</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Minador?</label>
													<br>
													<input type="radio" id="minador_si" name="minador" value="1" onchange="mostrar_minador()" <?php if ($dato->minador==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="minador_no" name="minador" value="0" onchange="mostrar_minador()" <?php if ($dato->minador==0){echo "checked";}?>> No
												</div>

												<div class="content_minador" id="content_minador">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="minador_fecha" id="minador_fecha" class="form-control" value="{{old('minador_fecha', $dato->minador_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="minador_zona_afectada[]" id="minador_zona_afectada" multiple="minador_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->minador_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->minador_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->minador_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->minador_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="minador_incidencia" id="minador_incidencia" class="form-control" value="{{old('minador_incidencia', $dato->minador_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="minador_control" id="minador_control" class="form-control" value="{{old('minador_control', $dato->minador_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Barrenador del Tallo</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Barrenador del Tallo?</label>
													<br>
													<input type="radio" id="barrenador_si" name="barrenador" value="1" onchange="mostrar_barrenador()" <?php if ($dato->barrenador==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="barrenador_no" name="barrenador" value="0" onchange="mostrar_barrenador()" <?php if ($dato->barrenador==0){echo "checked";}?>> No
												</div>

												<div class="content_barrenador" id="content_barrenador">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="barrenador_fecha" id="barrenador_fecha" class="form-control" value="{{old('barrenador_fecha', $dato->barrenador_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="barrenador_zona_afectada[]" id="barrenador_zona_afectada" multiple="barrenador_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->barrenador_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->barrenador_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->barrenador_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->barrenador_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="barrenador_incidencia" id="barrenador_incidencia" class="form-control" value="{{old('barrenador_incidencia', $dato->barrenador_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="barrenador_control" id="barrenador_control" class="form-control" value="{{old('barrenador_control', $dato->barrenador_control ?? '')}}" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Plaga:Nematodos</h4>
                        <div class="form-group">
                          <label >¿Detectó la Plaga Nematodos?</label>
													<br>
													<input type="radio" id="nematodos_si" name="nematodos" value="1" onchange="mostrar_nematodos()" <?php if ($dato->nematodos==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="nematodos_no" name="nematodos" value="0" onchange="mostrar_nematodos()" <?php if ($dato->nematodos==0){echo "checked";}?>> No
												</div>

												<div class="content_nematodos" id="content_nematodos">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="nematodos_fecha" id="nematodos_fecha" class="form-control" value="{{old('nematodos_fecha', $dato->nematodos_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona Afectada</label>
														<select class="form-control select2" name="nematodos_zona_afectada[]" id="nematodos_zona_afectada" multiple="nematodos_zona_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz" <?php if(strpos($dato->nematodos_zona_afectada, 'Raiz') !== false) {echo "selected";}?>>Raiz</option>
															<option value="Tallo" <?php if(strpos($dato->nematodos_zona_afectada, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
															<option value="Hojas"<?php if(strpos($dato->nematodos_zona_afectada, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
						                  <option value="Frutos" <?php if(strpos($dato->nematodos_zona_afectada, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de Incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="nematodos_incidencia" id="nematodos_incidencia" class="form-control" value="{{old('nematodos_incidencia', $dato->nematodos_incidencia ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Control Recomendado</label>
														<input type="text" name="nematodos_control" id="nematodos_control" class="form-control" value="{{old('nematodos_control', $dato->nematodos_control ?? '')}}" required>
													</div>
												</div>

												<br>
                        <button type="submit" class="mybtn">Actualizar</button>
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
<script type="text/javascript">
	window.onload=function() {
		//Ejecutamos todas las funciones
		mostrar_broca();
		mostrar_cepe();
		mostrar_grillo();
		mostrar_cochinilla();
		mostrar_escamas();
		mostrar_minador();
		mostrar_barrenador();
		mostrar_nematodos();
	}
</script>

<script type="text/javascript">
  function mostrar_broca() {
		broca_si = document.getElementById("broca_si");
		if (broca_si.checked) {
			document.getElementById("content_broca").style.display='block';
			document.getElementById("broca_fecha").required = true;
			document.getElementById("broca_zona_afectada").required = true;
			document.getElementById("broca_incidencia").required = true;
			document.getElementById("broca_control").required = true;
		}
		else {
			document.getElementById("content_broca").style.display='none';
			document.getElementById("broca_fecha").required = false;
			document.getElementById("broca_zona_afectada").required = false;
			document.getElementById("broca_incidencia").required = false;
			document.getElementById("broca_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_cepe() {
		cepe_si = document.getElementById("cepe_si");
		if (cepe_si.checked) {
			document.getElementById("content_cepe").style.display='block';
			document.getElementById("cepe_fecha").required = true;
			document.getElementById("cepe_zona_afectada").required = true;
			document.getElementById("cepe_incidencia").required = true;
			document.getElementById("cepe_control").required = true;
		}
		else {
			document.getElementById("content_cepe").style.display='none';
			document.getElementById("cepe_fecha").required = false;
			document.getElementById("cepe_zona_afectada").required = false;
			document.getElementById("cepe_incidencia").required = false;
			document.getElementById("cepe_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_grillo() {
		grillo_si = document.getElementById("grillo_si");
		if (grillo_si.checked) {
			document.getElementById("content_grillo").style.display='block';
			document.getElementById("grillo_fecha").required = true;
			document.getElementById("grillo_zona_afectada").required = true;
			document.getElementById("grillo_incidencia").required = true;
			document.getElementById("grillo_control").required = true;
		}
		else {
			document.getElementById("content_grillo").style.display='none';
			document.getElementById("grillo_fecha").required = false;
			document.getElementById("grillo_zona_afectada").required = false;
			document.getElementById("grillo_incidencia").required = false;
			document.getElementById("grillo_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_cochinilla() {
		cochinilla_si = document.getElementById("cochinilla_si");
		if (cochinilla_si.checked) {
			document.getElementById("content_cochinilla").style.display='block';
			document.getElementById("cochinilla_fecha").required = true;
			document.getElementById("cochinilla_zona_afectada").required = true;
			document.getElementById("cochinilla_incidencia").required = true;
			document.getElementById("cochinilla_control").required = true;
		}
		else {
			document.getElementById("content_cochinilla").style.display='none';
			document.getElementById("cochinilla_fecha").required = false;
			document.getElementById("cochinilla_zona_afectada").required = false;
			document.getElementById("cochinilla_incidencia").required = false;
			document.getElementById("cochinilla_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_escamas() {
		escamas_si = document.getElementById("escamas_si");
		if (escamas_si.checked) {
			document.getElementById("content_escamas").style.display='block';
			document.getElementById("escamas_fecha").required = true;
			document.getElementById("escamas_zona_afectada").required = true;
			document.getElementById("escamas_incidencia").required = true;
			document.getElementById("escamas_control").required = true;
		}
		else {
			document.getElementById("content_escamas").style.display='none';
			document.getElementById("escamas_fecha").required = false;
			document.getElementById("escamas_zona_afectada").required = false;
			document.getElementById("escamas_incidencia").required = false;
			document.getElementById("escamas_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_minador() {
		minador_si = document.getElementById("minador_si");
		if (minador_si.checked) {
			document.getElementById("content_minador").style.display='block';
			document.getElementById("minador_fecha").required = true;
			document.getElementById("minador_zona_afectada").required = true;
			document.getElementById("minador_incidencia").required = true;
			document.getElementById("minador_control").required = true;
		}
		else {
			document.getElementById("content_minador").style.display='none';
			document.getElementById("minador_fecha").required = false;
			document.getElementById("minador_zona_afectada").required = false;
			document.getElementById("minador_incidencia").required = false;
			document.getElementById("minador_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_barrenador() {
		barrenador_si = document.getElementById("barrenador_si");
		if (barrenador_si.checked) {
			document.getElementById("content_barrenador").style.display='block';
			document.getElementById("barrenador_fecha").required = true;
			document.getElementById("barrenador_zona_afectada").required = true;
			document.getElementById("barrenador_incidencia").required = true;
			document.getElementById("barrenador_control").required = true;
		}
		else {
			document.getElementById("content_barrenador").style.display='none';
			document.getElementById("barrenador_fecha").required = false;
			document.getElementById("barrenador_zona_afectada").required = false;
			document.getElementById("barrenador_incidencia").required = false;
			document.getElementById("barrenador_control").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_nematodos() {
		nematodos_si = document.getElementById("nematodos_si");
		if (nematodos_si.checked) {
			document.getElementById("content_nematodos").style.display='block';
			document.getElementById("nematodos_fecha").required = true;
			document.getElementById("nematodos_zona_afectada").required = true;
			document.getElementById("nematodos_incidencia").required = true;
			document.getElementById("nematodos_control").required = true;
		}
		else {
			document.getElementById("content_nematodos").style.display='none';
			document.getElementById("nematodos_fecha").required = false;
			document.getElementById("nematodos_zona_afectada").required = false;
			document.getElementById("nematodos_incidencia").required = false;
			document.getElementById("nematodos_control").required = false;
		}
  }
</script>
@endsection

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
                      <h3>Encuesta - Sistemas Agroforestales</h3>
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

                    <form action="{{ route('sist_agroforestales_actualizar', ['id' => $dato->id_sist_agroforestal]) }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

												<div class="form-group">
													<label >Año en que se produjo el registro de los datos que introducirá</label>
													<input type="number" min="1500" max="2050" step="1" name="ano" class="form-control" value="{{old('ano', $dato->ano ?? '')}}" required>
                        </div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Pacay</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Pacay asociados con el café?</label>
													<br>
													<input type="radio" id="pacay_si" name="pacay" value="1" onchange="mostrar_pacay()" <?php if ($dato->pacay==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="pacay_no" name="pacay" value="0" onchange="mostrar_pacay()" <?php if ($dato->pacay==0){echo "checked";}?>> No
												</div>

												<div class="content_pacay" id="content_pacay">
													<div class="form-group">
														<label >Fecha de Siembra de Pacay</label>
														<input type="date" name="pacay_fecha_siembra" id="pacay_fecha_siembra" class="form-control" value="{{old('pacay_fecha_siembra', $dato->pacay_fecha_siembra ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas de Pacay</label>
														<input type="number" min="0" step="1" name="pacay_cantidad" id="pacay_cantidad" class="form-control" value="{{old('pacay_cantidad', $dato->pacay_cantidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra de Pacay es Permanente?</label>
														<select class="form-control" name="pacay_permanente" id="pacay_permanente" required>
					                    <option value="1" <?php if ($dato->pacay_permanente==1){echo "selected";}?>>Si</option>
					                    <option value="0" <?php if ($dato->pacay_permanente==0){echo "selected";}?>>No</option>
					            			</select>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Plátano</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Plátano asociados con el café?</label>
													<br>
													<input type="radio" id="platano_si" name="platano" value="1" onchange="mostrar_platano()" <?php if ($dato->platano==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="platano_no" name="platano" value="0" onchange="mostrar_platano()" <?php if ($dato->platano==0){echo "checked";}?>> No
												</div>

												<div class="content_platano" id="content_platano">
													<div class="form-group">
														<label >Fecha de Siembra de Plátanos</label>
														<input type="date" name="platano_fecha_siembra" id="platano_fecha_siembra" class="form-control" value="{{old('platano_fecha_siembra', $dato->platano_fecha_siembra ?? '')}}"required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas de Plátano</label>
														<input type="number" min="0" step="1" name="platano_cantidad" id="platano_cantidad" class="form-control" value="{{old('platano_cantidad', $dato->platano_cantidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra de Plátanos es Permanente?</label>
														<select class="form-control" name="platano_permanente" id="platano_permanente" required>
					                    <option value="1" <?php if ($dato->platano_permanente==1){echo "selected";}?>>Si</option>
					                    <option value="0" <?php if ($dato->platano_permanente==0){echo "selected";}?>>No</option>
					            			</select>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Cítricos</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Cítricos asociados con el café?</label>
													<br>
													<input type="radio" id="citricos_si" name="citricos" value="1" onchange="mostrar_citricos()" <?php if ($dato->citricos==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="citricos_no" name="citricos" value="0" onchange="mostrar_citricos()" <?php if ($dato->citricos==0){echo "checked";}?>> No
												</div>

												<div class="content_citricos" id="content_citricos">
													<div class="form-group">
														<label >Fecha de Siembra de Cítricos</label>
														<input type="date" name="citricos_fecha_siembra" id="citricos_fecha_siembra" class="form-control" value="{{old('citricos_fecha_siembra', $dato->citricos_fecha_siembra ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas de Cítricos</label>
														<input type="number" min="0" step="1" name="citricos_cantidad" id="citricos_cantidad" class="form-control" value="{{old('citricos_cantidad', $dato->citricos_cantidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra de Cítricos es Permanente?</label>
														<select class="form-control" name="citricos_permanente" id="citricos_permanente" required>
					                    <option value="1" <?php if ($dato->citricos_permanente==1){echo "selected";}?>>Si</option>
					                    <option value="0" <?php if ($dato->citricos_permanente==0){echo "selected";}?>>No</option>
					            			</select>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Maderables</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Maderables asociados con el café?</label>
													<br>
													<input type="radio" id="maderables_si" name="maderables" value="1" onchange="mostrar_maderables()" <?php if ($dato->maderables==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="maderables_no" name="maderables" value="0" onchange="mostrar_maderables()" <?php if ($dato->maderables==0){echo "checked";}?>> No
												</div>

												<div class="content_maderables" id="content_maderables">
													<div class="form-group">
														<label >Fecha de Siembra de Maderables</label>
														<input type="date" name="maderables_fecha_siembra" id="maderables_fecha_siembra" class="form-control" value="{{old('maderables_fecha_siembra', $dato->maderables_fecha_siembra ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas de Maderables</label>
														<input type="number" min="0" step="1" name="maderables_cantidad" id="maderables_cantidad" class="form-control" value="{{old('maderables_cantidad', $dato->maderables_cantidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra de Maderables es Permanente?</label>
														<select class="form-control" name="maderables_permanente" id="maderables_permanente" required>
					                    <option value="1" <?php if ($dato->maderables_permanente==1){echo "selected";}?>>Si</option>
					                    <option value="0" <?php if ($dato->maderables_permanente==0){echo "selected";}?>>No</option>
					            			</select>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Frutas Amazónicas</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Frutas Amazónicas asociados con el café?</label>
													<br>
													<input type="radio" id="frutas_amazonicas_si" name="frutas_amazonicas" value="1" onchange="mostrar_frutas_amazonicas()" <?php if ($dato->frutas_amazonicas==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="frutas_amazonicas_no" name="frutas_amazonicas" value="0" onchange="mostrar_frutas_amazonicas()" <?php if ($dato->frutas_amazonicas==0){echo "checked";}?>> No
												</div>

												<div class="content_frutas_amazonicas" id="content_frutas_amazonicas">
													<div class="form-group">
														<label >Fecha de Siembra de Frutas Amazónicas</label>
														<input type="date" name="frutas_amazonicas_fecha_siembra" id="frutas_amazonicas_fecha_siembra" class="form-control" value="{{old('frutas_amazonicas_fecha_siembra', $dato->frutas_amazonicas_fecha_siembra ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas de Frutas Amazónicas</label>
														<input type="number" min="0" step="1" name="frutas_amazonicas_cantidad" id="frutas_amazonicas_cantidad" class="form-control" value="{{old('frutas_amazonicas_cantidad', $dato->frutas_amazonicas_cantidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra de Frutas Amazónicas es Permanente?</label>
														<select class="form-control" name="frutas_amazonicas_permanente" id="frutas_amazonicas_permanente" required>
					                    <option value="1" <?php if ($dato->frutas_amazonicas_permanente==1){echo "selected";}?>>Si</option>
					                    <option value="0" <?php if ($dato->frutas_amazonicas_permanente==0){echo "selected";}?>>No</option>
					            			</select>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Otro</h4>
                        <div class="form-group">
                          <label >¿Tiene otros cultivos asociados con el café? (No registrados previamente)</label>
													<br>
													<input type="radio" id="otros_si" name="otros" value="1" onchange="mostrar_otros()" <?php if ($dato->otros==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="otros_no" name="otros" value="0" onchange="mostrar_otros()" <?php if ($dato->otros==0){echo "checked";}?>> No
												</div>

												<div class="content_otros" id="content_otros">
													<div class="form-group">
														<label >Nombre del Cultivo Asociado</label>
														<input type="text" name="otros_descripcion" id="otros_descripcion" class="form-control" value="{{old('otros_descripcion', $dato->otros_descripcion ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha de Siembra</label>
														<input type="date" name="otros_fecha_siembra" id="otros_fecha_siembra" class="form-control" value="{{old('otros_fecha_siembra', $dato->otros_fecha_siembra ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas</label>
														<input type="number" min="0" step="1" name="otros_cantidad" id="otros_cantidad" class="form-control" value="{{old('otros_cantidad', $dato->otros_cantidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra es Permanente?</label>
														<select class="form-control" name="otros_permanente" id="otros_permanente" required>
					                    <option value="1" <?php if ($dato->otros_permanente==1){echo "selected";}?>>Si</option>
					                    <option value="0" <?php if ($dato->otros_permanente==0){echo "selected";}?>>No</option>
					            			</select>
	                        </div>
												</div>

												<br>
                        <button type="submit" class="mybtn">Editar</button>
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
		mostrar_pacay();
		mostrar_platano();
		mostrar_citricos();
		mostrar_maderables();
		mostrar_frutas_amazonicas();
		mostrar_otros();
	}
</script>

<script type="text/javascript">
  function mostrar_pacay() {
		pacay_si = document.getElementById("pacay_si");
		if (pacay_si.checked) {
			document.getElementById("content_pacay").style.display='block';
			document.getElementById("pacay_fecha_siembra").required = true;
			document.getElementById("pacay_cantidad").required = true;
			document.getElementById("pacay_permanente").required = true;
		}
		else {
			document.getElementById("content_pacay").style.display='none';
			document.getElementById("pacay_fecha_siembra").required = false;
			document.getElementById("pacay_cantidad").required = false;
			document.getElementById("pacay_permanente").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_platano() {
		platano_si = document.getElementById("platano_si");
		if (platano_si.checked) {
			document.getElementById("content_platano").style.display='block';
			document.getElementById("platano_fecha_siembra").required = true;
			document.getElementById("platano_cantidad").required = true;
			document.getElementById("platano_permanente").required = true;
		}
		else {
			document.getElementById("content_platano").style.display='none';
			document.getElementById("platano_fecha_siembra").required = false;
			document.getElementById("platano_cantidad").required = false;
			document.getElementById("platano_permanente").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_citricos() {
		citricos_si = document.getElementById("citricos_si");
		if (citricos_si.checked) {
			document.getElementById("content_citricos").style.display='block';
			document.getElementById("citricos_fecha_siembra").required = true;
			document.getElementById("citricos_cantidad").required = true;
			document.getElementById("citricos_permanente").required = true;
		}
		else {
			document.getElementById("content_citricos").style.display='none';
			document.getElementById("citricos_fecha_siembra").required = false;
			document.getElementById("citricos_cantidad").required = false;
			document.getElementById("citricos_permanente").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_maderables() {
		maderables_si = document.getElementById("maderables_si");
		if (maderables_si.checked) {
			document.getElementById("content_maderables").style.display='block';
			document.getElementById("maderables_fecha_siembra").required = true;
			document.getElementById("maderables_cantidad").required = true;
			document.getElementById("maderables_permanente").required = true;
		}
		else {
			document.getElementById("content_maderables").style.display='none';
			document.getElementById("maderables_fecha_siembra").required = false;
			document.getElementById("maderables_cantidad").required = false;
			document.getElementById("maderables_permanente").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_frutas_amazonicas() {
		frutas_amazonicas_si = document.getElementById("frutas_amazonicas_si");
		if (frutas_amazonicas_si.checked) {
			document.getElementById("content_frutas_amazonicas").style.display='block';
			document.getElementById("frutas_amazonicas_fecha_siembra").required = true;
			document.getElementById("frutas_amazonicas_cantidad").required = true;
			document.getElementById("frutas_amazonicas_permanente").required = true;
		}
		else {
			document.getElementById("content_frutas_amazonicas").style.display='none';
			document.getElementById("frutas_amazonicas_fecha_siembra").required = false;
			document.getElementById("frutas_amazonicas_cantidad").required = false;
			document.getElementById("frutas_amazonicas_permanente").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_otros() {
		otros_si = document.getElementById("otros_si");
		if (otros_si.checked) {
			document.getElementById("content_otros").style.display='block';
			document.getElementById("otros_descripcion").required = true;
			document.getElementById("otros_fecha_siembra").required = true;
			document.getElementById("otros_cantidad").required = true;
			document.getElementById("otros_permanente").required = true;
		}
		else {
			document.getElementById("content_otros").style.display='none';
			document.getElementById("otros_descripcion").required = false;
			document.getElementById("otros_fecha_siembra").required = false;
			document.getElementById("otros_cantidad").required = false;
			document.getElementById("otros_permanente").required = false;
		}
  }
</script>


@endsection

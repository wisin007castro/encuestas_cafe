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
                      <h3>Deficiencias</h3>
                        <p>Por favor responda las siguientes preguntas</p>
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

                    <form action="{{ route('deficiencias_guardar') }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
											<?php $a="California&Delaware&Alabama" ?>
												<div class="form-group">
													<label>Multiple</label>
                  <select class="duallistbox" name="multiple[]" multiple="multiple">
                    <option <?php if (strpos($a, 'Alabama') !== false) {	echo "selected";}?>>Alabama</option>
                    <option >Alaska</option>
                    <option <?php if (strpos($a, 'California') !== false) {	echo "selected";}?>>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                        </div>

												<br>
												<h4 style="color:white">Cultivo Asociado: Pacay</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Pacay asociados con el café?</label>
													<br>
													<input type="radio" id="pacay_si" name="pacay" value="1" onchange="mostrar_pacay()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="pacay_no" name="pacay" value="0" onchange="mostrar_pacay()"> No
												</div>

												<div class="content_pacay" id="content_pacay">
													<div class="form-group">
														<label >Fecha de Siembra de Pacay</label>
														<input type="date" name="pacay_fecha_siembra" id="pacay_fecha_siembra" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Cantidad Aproximada de Plantas de Pacay</label>
														<input type="number" min="0" step="1" name="pacay_cantidad" id="pacay_cantidad" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra de Pacay es Permanente?</label>
														<select class="form-control" name="pacay_permanente" id="pacay_permanente" required>
					                    <option value="1">Si</option>
					                    <option value="0">No</option>
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

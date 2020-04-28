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
                      <h3>Podas</h3>
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

                    <form action="{{ route('podas_guardar') }}"  method="post" class="" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <br>
                        <h4 style="color:white">Poda de Formación de Planta</h4>
                        <div class="form-group">
                          <label >¿Realizó Poda de Formación de Planta?</label>
													<br>
													<input type="radio" id="form_planta_si" name="form_planta" value="1" onchange="mostrar_form_planta()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="form_planta_no" name="form_planta" value="0" onchange="mostrar_form_planta()"> No
												</div>

												<div class="content_form_planta" id="content_form_planta">
													<div class="form-group">
														<label >Fecha de Poda de Formación de Planta</label>
														<input type="date" name="form_planta_fecha" id="form_planta_fecha" class="form-control" required>
                          </div>
                          <div class="form-group">
														<label >Recomendación de Fecha Final para Poda de Formación de Planta</label>
														<input type="date" name="form_planta_fecha_final" id="form_planta_fecha_final" class="form-control" required>
													</div>
                        </div>

                      {{-- MANTENIMIENTO --}}
											<br>
											<h4 style="color:white">Poda de Mantenimiento</h4>
                      <div class="form-group">
                        <label >¿Realizó Poda de Mantenimiento?</label>
                        <br>
                        <input type="radio" id="mantenimiento_si" name="mantenimiento" value="1" onchange="mostrar_mantenimiento()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="mantenimiento_no" name="mantenimiento" value="0" onchange="mostrar_mantenimiento()"> No
                      </div>

                      <div class="content_mantenimiento" id="content_mantenimiento">
                        <div class="form-group">
                          <label >Fecha de Poda de Mantenimiento</label>
                          <input type="date" name="mantenimiento_fecha" id="mantenimiento_fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label >Recomendación de Fecha Final para Poda de Mantenimiento</label>
                          <input type="date" name="mantenimiento_fecha_final" id="mantenimiento_fecha_final" class="form-control" required>
                        </div>
                      </div>

                      {{-- SELECCION DE BROTES --}}
                      <br>
											<h4 style="color:white">Poda de Selección de Brotes</h4>
                      <div class="form-group">
                        <label >¿Realizó Poda de Selección de Brotes?</label>
                        <br>
                        <input type="radio" id="sel_brotes_si" name="sel_brotes" value="1" onchange="mostrar_sel_brotes()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="sel_brotes_no" name="sel_brotes" value="0" onchange="mostrar_sel_brotes()"> No
                      </div>

                      <div class="content_sel_brotes" id="content_sel_brotes">
                        <div class="form-group">
                          <label >Fecha de Poda de Selección de Brotes</label>
                          <input type="date" name="sel_brotes_fecha" id="sel_brotes_fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label >Recomendación de Fecha Final para Poda de Selección de Brotes</label>
                          <input type="date" name="sel_brotes_fecha_final" id="sel_brotes_fecha_final" class="form-control" required>
                        </div>
                      </div>


                      {{-- REHABILITACION --}}
                      <br>
											<h4 style="color:white">Poda de Rehabilitación</h4>
                      <div class="form-group">
                        <label >¿Realizó Poda de Rehabilitación?</label>
                        <br>
                        <input type="radio" id="rehabilitacion_si" name="rehabilitacion" value="1" onchange="mostrar_rehabilitacion()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="rehabilitacion_no" name="rehabilitacion" value="0" onchange="mostrar_rehabilitacion()"> No
                      </div>

                      <div class="content_rehabilitacion" id="content_rehabilitacion">
                        <div class="form-group">
                          <label >Fecha de Poda de Rehabilitación</label>
                          <input type="date" name="rehabilitacion_fecha" id="rehabilitacion_fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label >Recomendación de Fecha Final para Poda de Rehabilitación</label>
                          <input type="date" name="rehabilitacion_fecha_final" id="rehabilitacion_fecha_final" class="form-control" required>
                        </div>
                      </div>

                      {{-- RENOVACION --}}
                      <br>
											<h4 style="color:white">Poda de Renovación</h4>
                      <div class="form-group">
                        <label >¿Realizó Poda de Renovación?</label>
                        <br>
                        <input type="radio" id="renovacion_si" name="renovacion" value="1" onchange="mostrar_renovacion()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="renovacion_no" name="renovacion" value="0" onchange="mostrar_renovacion()"> No
                      </div>

                      <div class="content_renovacion" id="content_renovacion">
                        <div class="form-group">
                          <label >Fecha de Poda de Renovación</label>
                          <input type="date" name="renovacion_fecha" id="renovacion_fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label >Recomendación de Fecha Final para Poda de Renovación</label>
                          <input type="date" name="renovacion_fecha_final" id="renovacion_fecha_final" class="form-control" required>
                        </div>
                      </div>

                      {{-- DESHOJE Y DESPUNTE --}}
                      <br>
											<h4 style="color:white">Deshoje y Despunte</h4>
                      <div class="form-group">
                        <label >¿Realizó Deshoje y Despunte?</label>
                        <br>
                        <input type="radio" id="deshoje_despunte_si" name="deshoje_despunte" value="1" onchange="mostrar_deshoje_despunte()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="deshoje_despunte_no" name="deshoje_despunte" value="0" onchange="mostrar_deshoje_despunte()"> No
                      </div>

                      <div class="content_deshoje_despunte" id="content_deshoje_despunte">
                        <div class="form-group">
                          <label >Fecha de Deshoje y Despunte</label>
                          <input type="date" name="deshoje_despunte_fecha" id="deshoje_despunte_fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label >Recomendación de Fecha Final para Deshoje y Despunte</label>
                          <input type="date" name="deshoje_despunte_fecha_final" id="deshoje_despunte_fecha_final" class="form-control" required>
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
  function mostrar_form_planta() {
		form_planta_si = document.getElementById("form_planta_si");
		if (form_planta_si.checked) {
			document.getElementById("content_form_planta").style.display='block';
			document.getElementById("form_planta_fecha").required = true;
			document.getElementById("form_planta_fecha_final").required = true;
		}
		else {
			document.getElementById("content_form_planta").style.display='none';
			document.getElementById("form_planta_fecha").required = false;
			document.getElementById("form_planta_fecha_final").required = false;
		}
  }

  function mostrar_mantenimiento() {
		mantenimiento_si = document.getElementById("mantenimiento_si");
		if (mantenimiento_si.checked) {
			document.getElementById("content_mantenimiento").style.display='block';
			document.getElementById("mantenimiento_fecha").required = true;
			document.getElementById("mantenimiento_fecha_final").required = true;
		}
		else {
			document.getElementById("content_mantenimiento").style.display='none';
			document.getElementById("mantenimiento_fecha").required = false;
			document.getElementById("mantenimiento_fecha_final").required = false;
		}
  }

  function mostrar_sel_brotes() {
		sel_brotes_si = document.getElementById("sel_brotes_si");
		if (sel_brotes_si.checked) {
			document.getElementById("content_sel_brotes").style.display='block';
			document.getElementById("sel_brotes_fecha").required = true;
			document.getElementById("sel_brotes_fecha_final").required = true;
		}
		else {
			document.getElementById("content_sel_brotes").style.display='none';
			document.getElementById("sel_brotes_fecha").required = false;
			document.getElementById("sel_brotes_fecha_final").required = false;
		}
  }

  function mostrar_rehabilitacion() {
		rehabilitacion_si = document.getElementById("rehabilitacion_si");
		if (rehabilitacion_si.checked) {
			document.getElementById("content_rehabilitacion").style.display='block';
			document.getElementById("rehabilitacion_fecha").required = true;
			document.getElementById("rehabilitacion_fecha_final").required = true;
		}
		else {
			document.getElementById("content_rehabilitacion").style.display='none';
			document.getElementById("rehabilitacion_fecha").required = false;
			document.getElementById("rehabilitacion_fecha_final").required = false;
		}
  }

  function mostrar_renovacion() {
		renovacion_si = document.getElementById("renovacion_si");
		if (renovacion_si.checked) {
			document.getElementById("content_renovacion").style.display='block';
			document.getElementById("renovacion_fecha").required = true;
			document.getElementById("renovacion_fecha_final").required = true;
		}
		else {
			document.getElementById("content_renovacion").style.display='none';
			document.getElementById("renovacion_fecha").required = false;
			document.getElementById("renovacion_fecha_final").required = false;
		}
  }

  function mostrar_deshoje_despunte() {
		deshoje_despunte_si = document.getElementById("deshoje_despunte_si");
		if (deshoje_despunte_si.checked) {
			document.getElementById("content_deshoje_despunte").style.display='block';
			document.getElementById("deshoje_despunte_fecha").required = true;
			document.getElementById("deshoje_despunte_fecha_final").required = true;
		}
		else {
			document.getElementById("content_deshoje_despunte").style.display='none';
			document.getElementById("deshoje_despunte_fecha").required = false;
			document.getElementById("deshoje_despunte_fecha_final").required = false;
		}
  }




</script>
@endsection

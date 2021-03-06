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
                      <h3>Enfermedades de cultivo de café</h3>
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

                    <form action="{{ route('enfermedades_guardar') }}" method="post" class="" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<br>
												<h4 style="color:white">Enfermedad: <b><i>Cercospora caffeicola</i></b></h4>
                        <div class="form-group">
                          <label >¿Detectó la enfermedad Cercospora caffeicola?</label>
													<br>
													<input type="radio" id="cercospora_si" name="cercospora" value="1" onchange="mostrar_cercospora()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="cercospora_no" name="cercospora" value="0" onchange="mostrar_cercospora()"> No
												</div>

												<div class="content_cercospora" id="content_cercospora">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="cercospora_fecha" id="cercospora_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="cercospora_area_afectada[]" id="cercospora_area_afectada" multiple="cercospora_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
						                  <option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="cercospora_incidencia" id="cercospora_incidencia" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="cercospora_recomendacion" id="cercospora_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="cercospora_foto" id="cercospora_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: La Roya <b><i>(Hemilenia vastatrix)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad La Roya (Hemilenia vastatrix)?</label>
													<br>
													<input type="radio" id="roya_si" name="roya" value="1" onchange="mostrar_roya()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="roya_no" name="roya" value="0" onchange="mostrar_roya()"> No
												</div>

												<div class="content_roya" id="content_roya">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="roya_fecha" id="roya_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="roya_area_afectada[]" id="roya_area_afectada" multiple="roya_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="roya_incidencia" id="roya_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="roya_recomendacion" id="roya_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="roya_foto" id="roya_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Ojo de Gallo <b><i>(Mycena citricolor)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Ojo de Gallo (Mycena citricolor)?</label>
													<br>
													<input type="radio" id="gallo_si" name="gallo" value="1" onchange="mostrar_gallo()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="gallo_no" name="gallo" value="0" onchange="mostrar_gallo()"> No
												</div>

												<div class="content_gallo" id="content_gallo">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="gallo_fecha" id="gallo_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="gallo_area_afectada[]" id="gallo_area_afectada" multiple="gallo_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="gallo_incidencia" id="gallo_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="gallo_recomendacion" id="gallo_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="gallo_foto" id="gallo_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Antracnosis <b><i>(Colletotrichum coffeanum)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Antracnosis (Colletotrichum coffeanum)?</label>
													<br>
													<input type="radio" id="antracnosis_si" name="antracnosis" value="1" onchange="mostrar_antracnosis()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="antracnosis_no" name="antracnosis" value="0" onchange="mostrar_antracnosis()"> No
												</div>

												<div class="content_antracnosis" id="content_antracnosis">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="antracnosis_fecha" id="antracnosis_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="antracnosis_area_afectada[]" id="antracnosis_area_afectada" multiple="antracnosis_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="antracnosis_incidencia" id="antracnosis_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="antracnosis_recomendacion" id="antracnosis_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="antracnosis_foto" id="antracnosis_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Marchites  Vascular <b><i>(Fusarium oxysporum f.sp. coffeae)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Marchites  Vascular(Fusarium oxysporum f.sp. coffeae)?</label>
													<br>
													<input type="radio" id="marchites_si" name="marchites" value="1" onchange="mostrar_marchites()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="marchites_no" name="marchites" value="0" onchange="mostrar_marchites()"> No
												</div>

												<div class="content_marchites" id="content_marchites">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="marchites_fecha" id="marchites_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="marchites_area_afectada[]" id="marchites_area_afectada" multiple="marchites_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="marchites_incidencia" id="marchites_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="marchites_recomendacion" id="marchites_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="marchites_foto" id="marchites_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Gotera <b><i>(Mycena citricolor)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Gotera (Mycena citricolor)?</label>
													<br>
													<input type="radio" id="gotera_si" name="gotera" value="1" onchange="mostrar_gotera()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="gotera_no" name="gotera" value="0" onchange="mostrar_gotera()"> No
												</div>

												<div class="content_gotera" id="content_gotera">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="gotera_fecha" id="gotera_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="gotera_area_afectada[]" id="gotera_area_afectada" multiple="gotera_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="gotera_incidencia" id="gotera_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="gotera_recomendacion" id="gotera_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="gotera_foto" id="gotera_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Mancha bacteriana <b><i>(Pseudomonas syringe)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Mancha bacteriana (Pseudomonas syringe)?</label>
													<br>
													<input type="radio" id="mancha_si" name="mancha" value="1" onchange="mostrar_mancha()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="mancha_no" name="mancha" value="0" onchange="mostrar_mancha()"> No
												</div>

												<div class="content_mancha" id="content_mancha">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="mancha_fecha" id="mancha_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="mancha_area_afectada[]" id="mancha_area_afectada" multiple="mancha_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="mancha_incidencia" id="mancha_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="mancha_recomendacion" id="mancha_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="mancha_foto" id="mancha_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Pudricion de la Raiz <b><i>(Rosellinia bunodes)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Pudricion de la Raiz (Rosellinia bunodes)?</label>
													<br>
													<input type="radio" id="pudricion_si" name="pudricion" value="1" onchange="mostrar_pudricion()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="pudricion_no" name="pudricion" value="0" onchange="mostrar_pudricion()"> No
												</div>

												<div class="content_pudricion" id="content_pudricion">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="pudricion_fecha" id="pudricion_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="pudricion_area_afectada[]" id="pudricion_area_afectada" multiple="pudricion_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="pudricion_incidencia" id="pudricion_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="pudricion_recomendacion" id="pudricion_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="pudricion_foto" id="pudricion_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Mal Rosado <b><i>(Corticium salmonicolor)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Mal Rosado (Corticium salmonicolor)?</label>
													<br>
													<input type="radio" id="rosado_si" name="rosado" value="1" onchange="mostrar_rosado()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="rosado_no" name="rosado" value="0" onchange="mostrar_rosado()"> No
												</div>

												<div class="content_rosado" id="content_rosado">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="rosado_fecha" id="rosado_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="rosado_area_afectada[]" id="rosado_area_afectada" multiple="rosado_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="rosado_incidencia" id="rosado_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="rosado_recomendacion" id="rosado_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="rosado_foto" id="rosado_foto" type="file" class="text-white" accept="image/*"/>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Enfermedad: Moho de Hilachas <b><i>(Pellicularia koleroga)</b></i></h4>
												<div class="form-group">
													<label >¿Detectó la enfermedad Moho de Hilachas (Pellicularia koleroga)?</label>
													<br>
													<input type="radio" id="moho_si" name="moho" value="1" onchange="mostrar_moho()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="moho_no" name="moho" value="0" onchange="mostrar_moho()"> No
												</div>

												<div class="content_moho" id="content_moho">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="moho_fecha" id="moho_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label>Área afectada</label>
														<select class="form-control select2" name="moho_area_afectada[]" id="moho_area_afectada" multiple="moho_area_afectada[]" data-placeholder="Selecione una o varias" required>
															<option value="Raiz">Raiz</option>
															<option value="Tallo">Tallo</option>
															<option value="Flores">Flores</option>
															<option value="Hojas">Hojas</option>
															<option value="Frutos">Frutos</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de incidencia (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="moho_incidencia" id="moho_incidencia" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Recomendación técnica</label>
														<input type="text" name="moho_recomendacion" id="moho_recomendacion" class="form-control" required>
													</div>

                          <div class="form-group">
                            <label >Fotografía</label>
                            <input name="moho_foto" id="moho_foto" type="file" class="text-white" accept="image/*"/>
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
	window.onload=function() {
		//Ejecutamos todas las funciones
		mostrar_cercospora();
		mostrar_roya();
		mostrar_gallo();
		mostrar_antracnosis();
		mostrar_marchites();
		mostrar_gotera();
		mostrar_mancha();
		mostrar_pudricion();
		mostrar_rosado();
		mostrar_moho();
	}
</script>

<script type="text/javascript">
  function mostrar_cercospora() {
		cercospora_si = document.getElementById("cercospora_si");
		if (cercospora_si.checked) {
			document.getElementById("content_cercospora").style.display='block';
			document.getElementById("cercospora_fecha").required = true;
			document.getElementById("cercospora_area_afectada").required = true;
			document.getElementById("cercospora_incidencia").required = true;
			document.getElementById("cercospora_recomendacion").required = true;
		}
		else {
			document.getElementById("content_cercospora").style.display='none';
			document.getElementById("cercospora_fecha").required = false;
			document.getElementById("cercospora_area_afectada").required = false;
			document.getElementById("cercospora_incidencia").required = false;
			document.getElementById("cercospora_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_roya() {
		roya_si = document.getElementById("roya_si");
		if (roya_si.checked) {
			document.getElementById("content_roya").style.display='block';
			document.getElementById("roya_fecha").required = true;
			document.getElementById("roya_area_afectada").required = true;
			document.getElementById("roya_incidencia").required = true;
			document.getElementById("roya_recomendacion").required = true;
		}
		else {
			document.getElementById("content_roya").style.display='none';
			document.getElementById("roya_fecha").required = false;
			document.getElementById("roya_area_afectada").required = false;
			document.getElementById("roya_incidencia").required = false;
			document.getElementById("roya_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_gallo() {
		gallo_si = document.getElementById("gallo_si");
		if (gallo_si.checked) {
			document.getElementById("content_gallo").style.display='block';
			document.getElementById("gallo_fecha").required = true;
			document.getElementById("gallo_area_afectada").required = true;
			document.getElementById("gallo_incidencia").required = true;
			document.getElementById("gallo_recomendacion").required = true;
		}
		else {
			document.getElementById("content_gallo").style.display='none';
			document.getElementById("gallo_fecha").required = false;
			document.getElementById("gallo_area_afectada").required = false;
			document.getElementById("gallo_incidencia").required = false;
			document.getElementById("gallo_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_antracnosis() {
		antracnosis_si = document.getElementById("antracnosis_si");
		if (antracnosis_si.checked) {
			document.getElementById("content_antracnosis").style.display='block';
			document.getElementById("antracnosis_fecha").required = true;
			document.getElementById("antracnosis_area_afectada").required = true;
			document.getElementById("antracnosis_incidencia").required = true;
			document.getElementById("antracnosis_recomendacion").required = true;
		}
		else {
			document.getElementById("content_antracnosis").style.display='none';
			document.getElementById("antracnosis_fecha").required = false;
			document.getElementById("antracnosis_area_afectada").required = false;
			document.getElementById("antracnosis_incidencia").required = false;
			document.getElementById("antracnosis_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_marchites() {
		marchites_si = document.getElementById("marchites_si");
		if (marchites_si.checked) {
			document.getElementById("content_marchites").style.display='block';
			document.getElementById("marchites_fecha").required = true;
			document.getElementById("marchites_area_afectada").required = true;
			document.getElementById("marchites_incidencia").required = true;
			document.getElementById("marchites_recomendacion").required = true;
		}
		else {
			document.getElementById("content_marchites").style.display='none';
			document.getElementById("marchites_fecha").required = false;
			document.getElementById("marchites_area_afectada").required = false;
			document.getElementById("marchites_incidencia").required = false;
			document.getElementById("marchites_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_gotera() {
		gotera_si = document.getElementById("gotera_si");
		if (gotera_si.checked) {
			document.getElementById("content_gotera").style.display='block';
			document.getElementById("gotera_fecha").required = true;
			document.getElementById("gotera_area_afectada").required = true;
			document.getElementById("gotera_incidencia").required = true;
			document.getElementById("gotera_recomendacion").required = true;
		}
		else {
			document.getElementById("content_gotera").style.display='none';
			document.getElementById("gotera_fecha").required = false;
			document.getElementById("gotera_area_afectada").required = false;
			document.getElementById("gotera_incidencia").required = false;
			document.getElementById("gotera_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_mancha() {
		mancha_si = document.getElementById("mancha_si");
		if (mancha_si.checked) {
			document.getElementById("content_mancha").style.display='block';
			document.getElementById("mancha_fecha").required = true;
			document.getElementById("mancha_area_afectada").required = true;
			document.getElementById("mancha_incidencia").required = true;
			document.getElementById("mancha_recomendacion").required = true;
		}
		else {
			document.getElementById("content_mancha").style.display='none';
			document.getElementById("mancha_fecha").required = false;
			document.getElementById("mancha_area_afectada").required = false;
			document.getElementById("mancha_incidencia").required = false;
			document.getElementById("mancha_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_pudricion() {
		pudricion_si = document.getElementById("pudricion_si");
		if (pudricion_si.checked) {
			document.getElementById("content_pudricion").style.display='block';
			document.getElementById("pudricion_fecha").required = true;
			document.getElementById("pudricion_area_afectada").required = true;
			document.getElementById("pudricion_incidencia").required = true;
			document.getElementById("pudricion_recomendacion").required = true;
		}
		else {
			document.getElementById("content_pudricion").style.display='none';
			document.getElementById("pudricion_fecha").required = false;
			document.getElementById("pudricion_area_afectada").required = false;
			document.getElementById("pudricion_incidencia").required = false;
			document.getElementById("pudricion_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_rosado() {
		rosado_si = document.getElementById("rosado_si");
		if (rosado_si.checked) {
			document.getElementById("content_rosado").style.display='block';
			document.getElementById("rosado_fecha").required = true;
			document.getElementById("rosado_area_afectada").required = true;
			document.getElementById("rosado_incidencia").required = true;
			document.getElementById("rosado_recomendacion").required = true;
		}
		else {
			document.getElementById("content_rosado").style.display='none';
			document.getElementById("rosado_fecha").required = false;
			document.getElementById("rosado_area_afectada").required = false;
			document.getElementById("rosado_incidencia").required = false;
			document.getElementById("rosado_recomendacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_moho() {
		moho_si = document.getElementById("moho_si");
		if (moho_si.checked) {
			document.getElementById("content_moho").style.display='block';
			document.getElementById("moho_fecha").required = true;
			document.getElementById("moho_area_afectada").required = true;
			document.getElementById("moho_incidencia").required = true;
			document.getElementById("moho_recomendacion").required = true;
		}
		else {
			document.getElementById("content_moho").style.display='none';
			document.getElementById("moho_fecha").required = false;
			document.getElementById("moho_area_afectada").required = false;
			document.getElementById("moho_incidencia").required = false;
			document.getElementById("moho_recomendacion").required = false;
		}
  }
</script>

@endsection

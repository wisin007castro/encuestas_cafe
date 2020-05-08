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
                      <h3>Encuesta - Post Cosecha</h3>
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

                    <form action="{{ route('post_cosecha_guardar') }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<br>
												<h4 style="color:white">Cosecha de Café en Guinda</h4>

												<div class="form-group">
													<label >¿Realizó la cosecha de café en guinda?</label>
													<br>
													<input type="radio" id="cosecha_si" name="cosecha" value="1" onchange="mostrar_cosecha()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="cosecha_no" name="cosecha" value="0" onchange="mostrar_cosecha()"> No
												</div>

												<div class="content_cosecha" id="content_cosecha">
	                        <div class="form-group">
	                          <label >Fecha de la cosecha de café en guinda</label>
														<br>
														<input type="date" name="cosecha_fecha" id="cosecha_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Bruto (Kg) de cosecha de café en guinda</label>
														<input type="number" min="0" step="0.01" name="cosecha_p_bruto" id="cosecha_p_bruto" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Descarte (Kg) de cosecha de café en guinda</label>
														<input type="number" min="0" step="0.01" name="cosecha_p_descarte" id="cosecha_p_descarte" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Efectivo (Kg) de cosecha de café en guinda</label>
														<input type="number" min="0" step="0.01" name="cosecha_p_efectivo" id="cosecha_p_efectivo" class="form-control" required>
	                        </div>
												</div>


												<br>
												<h4 style="color:white">Limpieza del Grano de Café (Agua)</h4>

												<div class="form-group">
													<label >¿Realizó la limpieza del grano de café?</label>
													<br>
													<input type="radio" id="limpieza_si" name="limpieza" value="1" onchange="mostrar_limpieza()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="limpieza_no" name="limpieza" value="0" onchange="mostrar_limpieza()"> No
												</div>

												<div class="content_limpieza" id="content_limpieza">
	                        <div class="form-group">
	                          <label >Fecha de la limpieza del grano de café</label>
														<br>
														<input type="date" name="limpieza_fecha" id="limpieza_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Bruto (Kg) de la limpieza del grano de café</label>
														<input type="number" min="0" step="0.01" name="limpieza_p_bruto" id="limpieza_p_bruto" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Descarte (Kg) de la limpieza del grano de café</label>
														<input type="number" min="0" step="0.01" name="limpieza_p_descarte" id="limpieza_p_descarte" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Efectivo (Kg) de la limpieza del grano de café</label>
														<input type="number" min="0" step="0.01" name="limpieza_p_efectivo" id="limpieza_p_efectivo" class="form-control" required>
	                        </div>
												</div>


												<br>
												<h4 style="color:white">Despulpado</h4>

												<div class="form-group">
													<label >¿Realizó el despulpado?</label>
													<br>
													<input type="radio" id="despulpado_si" name="despulpado" value="1" onchange="mostrar_despulpado()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="despulpado_no" name="despulpado" value="0" onchange="mostrar_despulpado()"> No
												</div>

												<div class="content_despulpado" id="content_despulpado">
													<div class="form-group">
														<label >Fecha del despulpado</label>
														<br>
														<input type="date" name="despulpado_fecha" id="despulpado_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Bruto (Kg) del despulpado</label>
														<input type="number" min="0" step="0.01" name="despulpado_p_bruto" id="despulpado_p_bruto" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Descarte (Kg) del despulpado</label>
														<input type="number" min="0" step="0.01" name="despulpado_p_descarte" id="despulpado_p_descarte" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Efectivo (Kg) del despulpado</label>
														<input type="number" min="0" step="0.01" name="despulpado_p_efectivo" id="despulpado_p_efectivo" class="form-control" required>
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
  function mostrar_cosecha() {
		cosecha_si = document.getElementById("cosecha_si");
		if (cosecha_si.checked) {
			document.getElementById("content_cosecha").style.display='block';
			document.getElementById("cosecha_fecha").required = true;
			document.getElementById("cosecha_p_bruto").required = true;
			document.getElementById("cosecha_p_descarte").required = true;
			document.getElementById("cosecha_p_efectivo").required = true;
		}
		else {
			document.getElementById("content_cosecha").style.display='none';
			document.getElementById("cosecha_fecha").required = false;
			document.getElementById("cosecha_p_bruto").required = false;
			document.getElementById("cosecha_p_descarte").required = false;
			document.getElementById("cosecha_p_efectivo").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_limpieza() {
		limpieza_si = document.getElementById("limpieza_si");
		if (limpieza_si.checked) {
			document.getElementById("content_limpieza").style.display='block';
			document.getElementById("limpieza_fecha").required = true;
			document.getElementById("limpieza_p_bruto").required = true;
			document.getElementById("limpieza_p_descarte").required = true;
			document.getElementById("limpieza_p_efectivo").required = true;
		}
		else {
			document.getElementById("content_limpieza").style.display='none';
			document.getElementById("limpieza_fecha").required = false;
			document.getElementById("limpieza_p_bruto").required = false;
			document.getElementById("limpieza_p_descarte").required = false;
			document.getElementById("limpieza_p_efectivo").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_despulpado() {
		despulpado_si = document.getElementById("despulpado_si");
		if (despulpado_si.checked) {
			document.getElementById("content_despulpado").style.display='block';
			document.getElementById("despulpado_fecha").required = true;
			document.getElementById("despulpado_p_bruto").required = true;
			document.getElementById("despulpado_p_descarte").required = true;
			document.getElementById("despulpado_p_efectivo").required = true;
		}
		else {
			document.getElementById("content_despulpado").style.display='none';
			document.getElementById("despulpado_fecha").required = false;
			document.getElementById("despulpado_p_bruto").required = false;
			document.getElementById("despulpado_p_descarte").required = false;
			document.getElementById("despulpado_p_efectivo").required = false;
		}
  }
</script>
@endsection

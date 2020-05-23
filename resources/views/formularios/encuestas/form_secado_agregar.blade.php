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
                      <h3>Secado</h3>
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

                    <form action="{{ route('secado_guardar') }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<br>
												<h4 style="color:white">Secado coCO</h4>

												<div class="form-group">
													<!--label >¿Realizó secado coCO?</label>
													<br-->
													<input type="radio" id="secado_si" name="secado" value="1" onchange="mostrar_secado()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="secado_no" name="secado" value="0" onchange="mostrar_secado()"> No
												</div>

												<div class="content_secado" id="content_secado">
	                        <div class="form-group">
	                          <label >Fecha de secado coCO</label>
														<br>
														<input type="date" name="secado_fecha" id="secado_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Total (Kg) de secado coCO</label>
														<input type="number" min="0" step="0.01" name="secado_p_total" id="secado_p_total" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Porcentaje de Humedad (%) de secado coCO</label>
														<input type="number" min="0" max="100" step="0.01" name="secado_humedad" id="secado_humedad" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Efectivo en Grano Final de secado coCO</label>
														<input type="number" min="0" step="0.01" name="secado_p_efectivo" id="secado_p_efectivo" class="form-control" required>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Secado pergamino sin miel</h4>

												<div class="form-group">
													<!--label >¿Realizó lavado y secado?</label>
													<br-->
													<input type="radio" id="lavado_si" name="lavado" value="1" onchange="mostrar_lavado()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="lavado_no" name="lavado" value="0" onchange="mostrar_lavado()"> No
												</div>

												<div class="content_lavado" id="content_lavado">
	                        <div class="form-group">
	                          <label >Fecha de secado pergamino sin miel</label>
														<br>
														<input type="date" name="lavado_fecha" id="lavado_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Total (Kg) de secado pergamino sin miel</label>
														<input type="number" min="0" step="0.01" name="lavado_p_total" id="lavado_p_total" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Porcentaje de Humedad (%) de secado pergamino sin miel</label>
														<input type="number" min="0" max="100" step="0.01" name="lavado_humedad" id="lavado_humedad" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Efectivo en Grano Final de secado pergamino sin miel</label>
														<input type="number" min="0" step="0.01" name="lavado_p_efectivo" id="lavado_p_efectivo" class="form-control" required>
	                        </div>
												</div>

												<br>
												<h4 style="color:white">Secado en Miel</h4>

												<div class="form-group">
													<!--label >¿Realizó secado en miel?</label>
													<br-->
													<input type="radio" id="miel_si" name="miel" value="1" onchange="mostrar_miel()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="miel_no" name="miel" value="0" onchange="mostrar_miel()"> No
												</div>

												<div class="content_miel" id="content_miel">
	                        <div class="form-group">
	                          <label >Fecha de secado en miel</label>
														<br>
														<input type="date" name="miel_fecha" id="miel_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Peso Total (Kg) de secado en miel</label>
														<input type="number" min="0" step="0.01" name="miel_p_total" id="miel_p_total" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Porcentaje de Humedad (%) de secado en miel</label>
														<input type="number" min="0" max="100" step="0.01" name="miel_humedad" id="miel_humedad" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >Peso Efectivo en Grano Final de secado en miel</label>
														<input type="number" min="0" step="0.01" name="miel_p_efectivo" id="miel_p_efectivo" class="form-control" required>
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
  function mostrar_secado() {
		secado_si = document.getElementById("secado_si");
		if (secado_si.checked) {
			document.getElementById("content_secado").style.display='block';
			document.getElementById("secado_fecha").required = true;
			document.getElementById("secado_p_total").required = true;
			document.getElementById("secado_humedad").required = true;
			document.getElementById("secado_p_efectivo").required = true;
		}
		else {
			document.getElementById("content_secado").style.display='none';
			document.getElementById("secado_fecha").required = false;
			document.getElementById("secado_p_total").required = false;
			document.getElementById("secado_humedad").required = false;
			document.getElementById("secado_p_efectivo").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_lavado() {
		lavado_si = document.getElementById("lavado_si");
		if (lavado_si.checked) {
			document.getElementById("content_lavado").style.display='block';
			document.getElementById("lavado_fecha").required = true;
			document.getElementById("lavado_p_total").required = true;
			document.getElementById("lavado_humedad").required = true;
			document.getElementById("lavado_p_efectivo").required = true;
		}
		else {
			document.getElementById("content_lavado").style.display='none';
			document.getElementById("lavado_fecha").required = false;
			document.getElementById("lavado_p_total").required = false;
			document.getElementById("lavado_humedad").required = false;
			document.getElementById("lavado_p_efectivo").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_miel() {
		miel_si = document.getElementById("miel_si");
		if (miel_si.checked) {
			document.getElementById("content_miel").style.display='block';
			document.getElementById("miel_fecha").required = true;
			document.getElementById("miel_p_total").required = true;
			document.getElementById("miel_humedad").required = true;
			document.getElementById("miel_p_efectivo").required = true;
		}
		else {
			document.getElementById("content_miel").style.display='none';
			document.getElementById("miel_fecha").required = false;
			document.getElementById("miel_p_total").required = false;
			document.getElementById("miel_humedad").required = false;
			document.getElementById("miel_p_efectivo").required = false;
		}
  }
</script>
@endsection

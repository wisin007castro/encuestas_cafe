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
                      <h3>Fertilización</h3>
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

                    <form action="{{ route('fertilizaciones_guardar') }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<br>
												<h4 style="color:white">Etapa: crecimiento vegetativo</h4>
                        <div class="form-group">
                          <!--label >¿Realizó la Etapa de Crecimiento Vegetativo?</label>
													<br-->
													<input type="radio" id="vegetativo_si" name="vegetativo" value="1" onchange="mostrar_vegetativo()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="vegetativo_no" name="vegetativo" value="0" onchange="mostrar_vegetativo()"> No
												</div>

												<div class="content_vegetativo" id="content_vegetativo">
													<div class="form-group">
														<label >Fecha de Aplicación</label>
														<input type="date" name="vegetativo_fecha" id="vegetativo_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Próxima Fecha de Aplicación Recomendada</label>
														<input type="date" name="vegetativo_fecha_aplicacion" id="vegetativo_fecha_aplicacion" class="form-control" required>
													</div>

													<h5 style="color:white">BIOLES - Area de Aplicación: Foliar</h5>

													<div class="form-group">
														<label >BIOLES: Nombre del Producto Aplicado</label>
														<input type="text" name="vegetativo_bioles_producto" id="vegetativo_bioles_producto" class="form-control" required>
													</div>

													<div class="form-group">
														<label >BIOLES: Dosis por Hectárea Litros o Kilos</label>
														<input type="number" min="0" step="0.01" name="vegetativo_bioles_dosis" id="vegetativo_bioles_dosis" class="form-control" required>
	                        </div>

													<h5 style="color:white">PURINES - Area de Aplicación: Raíz</h5>

													<div class="form-group">
														<label >PURINES: Nombre del Producto Aplicado</label>
														<input type="text" name="vegetativo_purines_producto" id="vegetativo_purines_producto" class="form-control" required>
													</div>

													<div class="form-group">
														<label >PURINES: Dosis por Hectárea Litros o Kilos</label>
														<input type="number" min="0" step="0.01" name="vegetativo_purines_dosis" id="vegetativo_purines_dosis" class="form-control" required>
	                        </div>
												</div>


												<input type="hidden" name="reproductivo" value="0">
												<!--br>
												<h4 style="color:white">Etapa: Crecimiento Reprpdictivo</h4>
												<div class="form-group">
													<label >¿Realizó la Etapa de Crecimiento Reproductivo?</label>
													<br>
													<input type="radio" id="reproductivo_si" name="reproductivo" value="1" onchange="mostrar_reproductivo()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="reproductivo_no" name="reproductivo" value="0" onchange="mostrar_reproductivo()"> No
												</div>

												<div class="content_reproductivo" id="content_reproductivo">
													<div class="form-group">
														<label >Fecha de Aplicación</label>
														<input type="date" name="reproductivo_fecha" id="reproductivo_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Próxima Fecha de Aplicación Recomendada</label>
														<input type="date" name="reproductivo_fecha_aplicacion" id="reproductivo_fecha_aplicacion" class="form-control" required>
													</div>

													<h5 style="color:white">COMPOST - Area de Aplicación: Raiz - Suelo</h5>

													<div class="form-group">
														<label >COMPOST: Nombre del Producto Aplicado</label>
														<input type="text" name="reproductivo_producto" id="reproductivo_producto" class="form-control" required>
													</div>

													<div class="form-group">
														<label >COMPOST: Dosis por Hectárea Litros o Kilos</label>
														<input type="number" min="0" step="0.01" name="reproductivo_dosis" id="reproductivo_dosis" class="form-control" required>
													</div>
												</div-->

												<br>
												<h4 style="color:white">Etapa: fructificación</h4>

												<br>
												<h4 style="color:white">Floración</h4>
												<div class="form-group">
													<!--label >¿Realizó la Etapa de Floración?</label>
													<br-->
													<input type="radio" id="floracion_si" name="floracion" value="1" onchange="mostrar_floracion()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="floracion_no" name="floracion" value="0" onchange="mostrar_floracion()"> No
												</div>

												<div class="content_floracion" id="content_floracion">
													<div class="form-group">
														<label >Fecha de Aplicación</label>
														<input type="date" name="floracion_fecha" id="floracion_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Próxima Fecha de Aplicación Recomendada</label>
														<input type="date" name="floracion_fecha_aplicacion" id="floracion_fecha_aplicacion" class="form-control" required>
													</div>

													<h5 style="color:white">CORRECTOR DE SUELO - Area de Aplicación: Raiz - Suelo</h5>

													<div class="form-group">
														<label >CORRECTOR DE SUELO: Nombre del Producto Aplicado</label>
														<input type="text" name="floracion_producto" id="floracion_producto" class="form-control" required>
													</div>

													<div class="form-group">
														<label >CORRECTOR DE SUELO: Dosis por Hectárea Litros o Kilos</label>
														<input type="number" min="0" step="0.01" name="floracion_dosis" id="floracion_dosis" class="form-control" required>
													</div>
												</div>


												<br>
												<h4 style="color:white">Maduración<!--En Bd tiene el nombre fructificacion, se cambio a solicitud del cliente los labels--></h4>
												<div class="form-group">
													<!--label >¿Realizó la Etapa de Fructificación?</label>
													<br-->
													<input type="radio" id="fructificacion_si" name="fructificacion" value="1" onchange="mostrar_fructificacion()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="fructificacion_no" name="fructificacion" value="0" onchange="mostrar_fructificacion()"> No
												</div>

												<div class="content_fructificacion" id="content_fructificacion">
													<div class="form-group">
														<label >Fecha de Aplicación</label>
														<input type="date" name="fructificacion_fecha" id="fructificacion_fecha" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Próxima Fecha de Aplicación Recomendada</label>
														<input type="date" name="fructificacion_fecha_aplicacion" id="fructificacion_fecha_aplicacion" class="form-control" required>
													</div>

													<h5 style="color:white">PRODUCTOS QUÍMICOS - Area de Aplicación: Raiz - Suelo</h5>

													<div class="form-group">
														<label >PRODUCTOS QUÍMICOS: Nombre del Producto Aplicado</label>
														<input type="text" name="fructificacion_producto" id="fructificacion_producto" class="form-control" required>
													</div>

													<div class="form-group">
														<label >PRODUCTOS QUÍMICOS: Dosis por Hectárea Litros o Kilos</label>
														<input type="number" min="0" step="0.01" name="fructificacion_dosis" id="fructificacion_dosis" class="form-control" required>
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
		mostrar_vegetativo();
		mostrar_reproductivo();
		mostrar_floracion();
		mostrar_fructificacion();
	}
</script>

<script type="text/javascript">
  function mostrar_vegetativo() {
		vegetativo_si = document.getElementById("vegetativo_si");
		if (vegetativo_si.checked) {
			document.getElementById("content_vegetativo").style.display='block';
			document.getElementById("vegetativo_fecha").required = true;
			document.getElementById("vegetativo_fecha_aplicacion").required = true;
			document.getElementById("vegetativo_bioles_producto").required = true;
			document.getElementById("vegetativo_bioles_dosis").required = true;
			document.getElementById("vegetativo_purines_producto").required = true;
			document.getElementById("vegetativo_purines_dosis").required = true;
		}
		else {
			document.getElementById("content_vegetativo").style.display='none';
			document.getElementById("vegetativo_fecha").required = false;
			document.getElementById("vegetativo_fecha_aplicacion").required = false;
			document.getElementById("vegetativo_bioles_producto").required = false;
			document.getElementById("vegetativo_bioles_dosis").required = false;
			document.getElementById("vegetativo_purines_producto").required = false;
			document.getElementById("vegetativo_purines_dosis").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_reproductivo() {
		reproductivo_si = document.getElementById("reproductivo_si");
		if (reproductivo_si.checked) {
			document.getElementById("content_reproductivo").style.display='block';
			document.getElementById("reproductivo_fecha").required = true;
			document.getElementById("reproductivo_fecha_aplicacion").required = true;
			document.getElementById("reproductivo_producto").required = true;
			document.getElementById("reproductivo_osis").required = true;
		}
		else {
			document.getElementById("content_reproductivo").style.display='none';
			document.getElementById("reproductivo_fecha").required = false;
			document.getElementById("reproductivo_fecha_aplicacion").required = false;
			document.getElementById("reproductivo_producto").required = false;
			document.getElementById("reproductivo_dosis").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_floracion() {
		floracion_si = document.getElementById("floracion_si");
		if (floracion_si.checked) {
			document.getElementById("content_floracion").style.display='block';
			document.getElementById("floracion_fecha").required = true;
			document.getElementById("floracion_fecha_aplicacion").required = true;
			document.getElementById("floracion_producto").required = true;
			document.getElementById("floracion_osis").required = true;
		}
		else {
			document.getElementById("content_floracion").style.display='none';
			document.getElementById("floracion_fecha").required = false;
			document.getElementById("floracion_fecha_aplicacion").required = false;
			document.getElementById("floracion_producto").required = false;
			document.getElementById("floracion_dosis").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_fructificacion() {
		fructificacion_si = document.getElementById("fructificacion_si");
		if (fructificacion_si.checked) {
			document.getElementById("content_fructificacion").style.display='block';
			document.getElementById("fructificacion_fecha").required = true;
			document.getElementById("fructificacion_fecha_aplicacion").required = true;
			document.getElementById("fructificacion_producto").required = true;
			document.getElementById("fructificacion_osis").required = true;
		}
		else {
			document.getElementById("content_fructificacion").style.display='none';
			document.getElementById("fructificacion_fecha").required = false;
			document.getElementById("fructificacion_fecha_aplicacion").required = false;
			document.getElementById("fructificacion_producto").required = false;
			document.getElementById("fructificacion_dosis").required = false;
		}
  }
</script>
@endsection

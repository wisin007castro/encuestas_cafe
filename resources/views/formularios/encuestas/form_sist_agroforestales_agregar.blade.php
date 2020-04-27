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

                    <form action="{{ url('enviar_gastronomia') }}"  method="post" id="f_enviar_gastronomia" class="formentrada" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<h4 style="color:white">Cultivo Asociado: Pacay</h4>
                        <div class="form-group">
                          <label >¿Tiene cultivos de Pacay aosciados con el café?</label>
													<br>
													<input type="radio" id="pacay_si" name="pacay" value="1" onchange="mostrar_pacay()" checked> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="pacay_no" name="pacay" value="0" onchange="mostrar_pacay()"> No
												</div>

												<div class="content_pacay" id="content_pacay">
													<div class="form-group">
														<label >Cantidad Aproximada de Plantas</label>
														<input type="date" name="pacay_fecha_siembra" id="pacay_fecha_siembra" class="form-control" required>
													</div>

													<div class="form-group">
														<label >Fecha de Siembra</label>
														<input type="number" min="0" step="1" name="pacay_cantidad" id="pacay_cantidad" class="form-control" required>
	                        </div>

													<div class="form-group">
														<label >¿La Siembra es Permanente?</label>
														<select class="form-control" name="pacay_permanente" id="pacay_permanente">
					                    <option value="1">Si</option>
					                    <option value="0">No</option>
					            			</select>
	                        </div>
												</div>

												<br>
                        <button type="submit" class="mybtn">Registrar</button>
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
			//alert(pacay_si);
        /*element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }*/
    }
</script>


@endsection

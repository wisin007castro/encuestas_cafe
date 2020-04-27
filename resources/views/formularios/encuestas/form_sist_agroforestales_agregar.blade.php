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
													<input type="radio" id="pacay_si" name="pacay" value="1" onchange="mostrar_pacay()"> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="pacay_no" name="pacay" value="0" onchange="mostrar_pacay()" checked> No
												</div>

												<div class="content_pacay" id="content_pacay">
													<div class="form-group">
														<label >Densidad de Siembra</label>
														<input type="number" min="0" step="1" oninput="calculo_cantidad_plantas()" name="densidad" id="densidad" placeholder="0" class="form-control" value="" required/ >
													</div>
												</div>



                        <div class="form-group">
                          <label >Superficie en Hectáreas (Ha)</label>
                          <input type="number" min="0" step="0.01" oninput="calculo_cantidad_plantas()" name="superficie" id="superficie" placeholder="0" class="form-control" value="" required/>
                        </div>

                        <div class="form-group">
                          <label >Cantidad de Plantas</label>
                          <input type="number" name="cantidad_plantas" id="cantidad_plantas" placeholder="0" class="form-control" value="" readonly/>
                        </div>

                        <div class="form-group">
                          <label >Plantas Muertas</label>
                          <input type="number" min="0" step="0.01" oninput="calculo_plantas_efectivas()" name="plantas_muertas" id="plantas_muertas" placeholder="0" class="form-control" value="" required/>
                        </div>

                        <div class="form-group">
                          <label >Plantas Efectivas</label>
                          <input type="number" name="plntas_efectivas" id="plantas_efectivas" placeholder="0" class="form-control" value="" readonly/>
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
			}
			else {
				document.getElementById("content_pacay").style.display='none';
			}
			alert(pacay_si);
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

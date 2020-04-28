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
                      <h3>FAUTAPO</h3>
											<p>INVENTARIO DE PARCELAS CULTIVADAS DE CAFÉ Y CACAO</p>
                    </div>
                    <div class="myform-top-right">
                      <i class="fa fa-info-circle"></i>
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

                   <div id="div_notificacion_sol" class="myform-bottom col-md-5">
                   	<div class="form-group" style="text-align:center">
											<br><br>
											<img  src="{{ url('img/fautapo.png') }} " />
											<br><br>
										</div>
                   </div>
									 <!--div id="div_notificacion_sol" class="col-md-1">

									 </div-->
                   <div id="div_notificacion_sol" class="myform-bottom col-md-7">
                   	<div class="form-group" style="text-align:center">

											<h4>El Instituto Geográfico Militar se constituye en la actualidad en una de las instituciones
												con mayor experiencia profesional y renovada tecnología instrumental para la ejecución de diferentes
												trabajos en el campo de la Cartografía, Geodesia, Fotogrametría, Topografía, Catastro, Recursos Naturales,
												Demarcación de Limites y trabajos en general, es por ello que a través del Distrito Geográfico de Cobija se
												presentó la propuesta del  Proyecto: INVENTARIO DE PARCELAS CULTIVADAS DE CACAO Y CAFÉ DE FAUTAPO</h4>
										 </div>
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
<script>
	function calculo_cantidad_plantas() {
  	var densidad = document.getElementById("densidad").value;
  	var superficie = document.getElementById("superficie").value;
		document.getElementById("cantidad_plantas").value = ((10000*superficie)/densidad).toFixed(2);
	}
</script>

<script>
	function calculo_plantas_efectivas() {
		var cantidad_plantas = document.getElementById("cantidad_plantas").value;
  	var plantas_muertas = document.getElementById("plantas_muertas").value;
		document.getElementById("plantas_efectivas").value = (cantidad_plantas-plantas_muertas).toFixed(2);
	}
</script>


@endsection

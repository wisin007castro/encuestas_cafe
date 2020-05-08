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
                      <h3>MEDIOS DE CONTACTO</h3>
											<p>FAUTAPO</p>
                    </div>
                    <div class="myform-top-right">
                      <i class="fa fa-phone-square"></i>
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
                   	<div class="form-group" style="text-align:center">
											<h4>Contacto Cobija</h4>
											<p> <i class="fa fa-phone"></i> (591) (3) 842-1245 </p>
											<p> <i class="fa fa-at"></i> fautapo.redamazonica@fundacionautapo.org </p>
											<p> <i class="fa fa-map-marker"></i> Av. los Tajibos Nº 147 entre Av. 9 de Febrero y Av. Manuripi</p>

											<br><br>
											<h4>Contacto Sede - Tarija</h4>
											<p> <i class="fa fa-phone"></i> (591) 4 6114208 </p>
											<p> <i class="fa fa-at"></i> fautapo.tarija@fundacionautapo.org </p>
											<p> <i class="fa fa-clock-o"></i> Atención de Lunes a Viernes 9:00-17:00</p>
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

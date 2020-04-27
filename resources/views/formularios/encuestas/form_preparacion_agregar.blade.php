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
                      <h3>Preparación del Terreno</h3>
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

                    <form action="{{ route('form_densidad_guardar') }}"  method="post" class="" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- <h4 style="color:white">Titulo principal si lo tuviera Ej. Biologico</h4> --}}
                        <br>
                        <div class="form-group">
                          <label >Fecha</label>
                          <input type="date" name="fecha" id="fecha" class="form-control" value="" required/ >
												</div>
                        <br>
                        <div class="form-group">
                          <label >Metodo</label>
                          <div class="radio">
                            <label>
                              <input type="radio" name="quema" id="quema1" value="1" checked="">
                              Con Quema
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="quema" id="quema2" value="0">
                              Sin Quema
                            </label>
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

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
                      <h3>Encuesta - Densidad de Plantación de Café</h3>
                        <p>Por favor responda las siguientes preguntas (edición)</p>
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

                    <form action="{{ route('densidad_actualizar', ['id' => $dato->id_densidad]) }}"  method="post" id="f_enviar_gastronomia" class="" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<div class="form-group">
													<label >Año en que se produjo el registro de los datos que introducirá</label>
													<input type="number" min="1500" max="2050" step="1" name="ano" class="form-control" value="{{old('ano', $dato->ano ?? '')}}" required>
												</div>

                        <div class="form-group">
                          <label >Densidad de Siembra</label>
                          <input type="number" min="0" step="1" oninput="calculo_cantidad_plantas()" name="densidad" id="densidad" placeholder="0" class="form-control" value="{{old('densidad', $dato->densidad ?? '')}}" required/ >
												</div>

                        <div class="form-group">
                          <label >Superficie en Hectáreas (Ha)</label>
                          <input type="number" min="0" step="0.01" oninput="calculo_cantidad_plantas()" name="superficie" id="superficie" placeholder="0" class="form-control" value="{{old('superficie', $dato->superficie ?? '')}}" required/>
                        </div>

                        <div class="form-group">
                          <label >Cantidad de Plantas</label>
                          <input type="number" name="cantidad_plantas" id="cantidad_plantas" placeholder="0" class="form-control" value="{{old('cantidad_plantas', $dato->cantidad_plantas ?? '')}}" readonly/>
                        </div>

                        <div class="form-group">
                          <label >Plantas Muertas</label>
                          <input type="number" min="0" step="0.01" oninput="calculo_plantas_efectivas()" name="plantas_muertas" id="plantas_muertas" placeholder="0" class="form-control" value="{{old('plantas_muertas', $dato->plantas_muertas ?? '')}}" required/>
                        </div>

                        <div class="form-group">
                          <label >Plantas Efectivas</label>
                          <input type="number" name="plntas_efectivas" id="plantas_efectivas" placeholder="0" class="form-control" value="{{old('plantas_efectivas', $dato->plantas_efectivas ?? '')}}" readonly/>
                        </div>
												<br>
                        <button type="submit" class="mybtn">Editar</button>
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

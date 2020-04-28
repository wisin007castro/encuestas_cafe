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
                    <form action="{{ route('preparacion_actualizar', ['id' => $dato->id_preparacion]) }}"  method="post" class="" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- <h4 style="color:white">Titulo principal si lo tuviera Ej. Biologico</h4> --}}
                        <br>
                        <div class="form-group">
                          <label >Fecha</label>
                          <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('fecha', $dato->fecha ?? '')}}" required/ >
												</div>
                        <br>
                        <div class="form-group">
                          <label >Metodo</label>
                          <div class="radio">
                            <label>
                              @if ($dato->con_quema == 1)
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
                              @else
                              <input type="radio" name="quema" id="quema1" value="1">
                              Con Quema
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="quema" id="quema2" value="0" checked="">
                              Sin Quema
                            </label>
                          </div>
                              @endif

                        </div>
												<br>
                        <button type="submit" class="mybtn">Actualizar</button>
                      </form>

                    </div>
              </div>
            </div>
        </div>
      </div>

</section>

</section>
@endsection
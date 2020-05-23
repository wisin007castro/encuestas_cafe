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
                      <h3>Cosecha</h3>
                        <p>Por favor responda las siguientes preguntas (Editando)</p>
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

                    <form action="{{ route('cosecha_actualizar', ['id' => $dato->id_cosecha]) }}"  method="post" class="" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <div class="form-group">
                          <label >Fecha</label>
                          <input type="date" name="fecha" id="fecha" class="form-control" value="{{old('ano', $dato->fecha ?? '')}}" required/ >
												</div>
                        <br>
                        <div class="form-group">
                          <label >Método de Cosecha</label>
													<div class="radio">
														<label>
												@if ($dato->manual == 1)
																<input type="radio" name="metodo" id="metodo1" value="1" checked="">
																Manual
														</label>
													</div>
													<div class="radio">
                            <label>
                              <input type="radio" name="metodo" id="metodo2" value="0">
                              Mecánica
                            </label>
                          </div>
												@else
																<input type="radio" name="metodo" id="metodo1" value="1">
																Manual
														</label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="metodo" id="metodo2" value="0" checked="">
															Mecánica
														</label>
													</div>
												@endif

												<div class="form-group">
													<label >Peso bruto (Kg) de cosecha de café</label>
													<input type="number" min="0" step="0.01" name="peso_bruto" id="peso_bruto" class="form-control" value="{{old('peso_bruto', $dato->peso_bruto ?? '')}}" required>
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

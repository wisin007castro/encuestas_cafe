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
                      <h3>Deficiencias</h3>
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

                    <form action="{{ route('deficiencias_actualizar', ['id' => $dato->id_deficiencia])}}" method="post" class="" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

												<br>
												<h4 style="color:white">Deficiencia: Fósforo (P)</h4>
                        <div class="form-group">
                          <!--label >¿Existe deficiencia de Fósforo (P)?</label>
													<br-->
													<input type="radio" id="p_si" name="p" value="1" onchange="mostrar_p()" <?php if ($dato->p==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="p_no" name="p" value="0" onchange="mostrar_p()" <?php if ($dato->p==0){echo "checked";}?>> No
												</div>

												<div class="content_p" id="content_p">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="p_fecha" id="p_fecha" class="form-control" value="{{old('p_fecha', $dato->p_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Fósforo (P)</label>
														<select class="form-control select2" name="p_deficiencia[]" id="p_deficiencia" multiple="p_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->p_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
							                  <option value="Frutos" <?php if(strpos($dato->p_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
							                  <option value="Hojas" <?php if(strpos($dato->p_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
							                  <option value="Flores" <?php if(strpos($dato->p_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
							                  <option value="Brotes" <?php if(strpos($dato->p_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="p_severidad" id="p_severidad" class="form-control" value="{{old('p_severidad', $dato->p_severidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="p_producto" id="p_producto" class="form-control" value="{{old('p_producto', $dato->p_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="p_fecha_aplicacion" id="p_fecha_aplicacion" class="form-control" value="{{old('p_fecha_aplicacion', $dato->p_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->p_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="p_foto" id="p_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Potasio (K)</h4>
                        <div class="form-group">
                          <!--label >¿Existe deficiencia de Potasio (K)?</label>
													<br-->
													<input type="radio" id="k_si" name="k" value="1" onchange="mostrar_k()" <?php if ($dato->k==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="k_no" name="k" value="0" onchange="mostrar_k()" <?php if ($dato->k==0){echo "checked";}?>> No
												</div>

												<div class="content_k" id="content_k">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="k_fecha" id="k_fecha" class="form-control" value="{{old('k_fecha', $dato->k_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Potasio (K)</label>
														<select class="form-control select2" name="k_deficiencia[]" id="k_deficiencia" multiple="k_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->k_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
							                  <option value="Frutos" <?php if(strpos($dato->k_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
							                  <option value="Hojas" <?php if(strpos($dato->k_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
							                  <option value="Flores" <?php if(strpos($dato->k_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
							                  <option value="Brotes" <?php if(strpos($dato->k_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="k_severidad" id="k_severidad" class="form-control"  value="{{old('k_severidad', $dato->k_severidad ?? '')}}"required>
	                        </div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="k_producto" id="k_producto" class="form-control" value="{{old('k_producto', $dato->k_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="k_fecha_aplicacion" id="k_fecha_aplicacion" class="form-control" value="{{old('k_fecha_aplicacion', $dato->k_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->k_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="k_foto" id="k_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Calcio (Ca)</h4>
                        <div class="form-group">
                          <!--label >¿Existe deficiencia de Calcio (Ca)?</label>
													<br-->
													<input type="radio" id="ca_si" name="ca" value="1" onchange="mostrar_ca()" <?php if ($dato->ca==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="ca_no" name="ca" value="0" onchange="mostrar_ca()" <?php if ($dato->ca==0){echo "checked";}?>> No
												</div>

												<div class="content_ca" id="content_ca">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="ca_fecha" id="ca_fecha" class="form-control" value="{{old('ca_fecha', $dato->ca_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Calcio (Ca)</label>
														<select class="form-control select2" name="ca_deficiencia[]" id="ca_deficiencia" multiple="ca_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->ca_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
							                  <option value="Frutos" <?php if(strpos($dato->ca_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
							                  <option value="Hojas" <?php if(strpos($dato->ca_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
							                  <option value="Flores" <?php if(strpos($dato->ca_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
							                  <option value="Brotes" <?php if(strpos($dato->ca_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="ca_severidad" id="ca_severidad" class="form-control" value="{{old('ca_severidad', $dato->ca_severidad ?? '')}}" required>
	                        </div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="ca_producto" id="ca_producto" class="form-control" value="{{old('ca_producto', $dato->ca_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="ca_fecha_aplicacion" id="ca_fecha_aplicacion" class="form-control" value="{{old('ca_fecha_aplicacion', $dato->ca_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->ca_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="ca_foto" id="ca_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Magnesio (Mg)</h4>
												<div class="form-group">
													<!--label >¿Existe deficiencia de Magnesio (Mg)?</label>
													<br-->
													<input type="radio" id="mg_si" name="mg" value="1" onchange="mostrar_mg()" <?php if ($dato->mg==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="mg_no" name="mg" value="0" onchange="mostrar_mg()" <?php if ($dato->mg==0){echo "checked";}?>> No
												</div>

												<div class="content_mg" id="content_mg">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="mg_fecha" id="mg_fecha" class="form-control" value="{{old('mg_fecha', $dato->mg_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Magnesio (Mg)</label>
														<select class="form-control select2" name="mg_deficiencia[]" id="mg_deficiencia" multiple="mg_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->mg_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
																<option value="Frutos" <?php if(strpos($dato->mg_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
																<option value="Hojas" <?php if(strpos($dato->mg_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
																<option value="Flores" <?php if(strpos($dato->mg_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
																<option value="Brotes" <?php if(strpos($dato->mg_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="mg_severidad" id="mg_severidad" class="form-control" value="{{old('mg_severidad', $dato->mg_severidad ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="mg_producto" id="mg_producto" class="form-control" value="{{old('mg_producto', $dato->mg_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="mg_fecha_aplicacion" id="mg_fecha_aplicacion" class="form-control" value="{{old('mg_fecha_aplicacion', $dato->mg_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->mg_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="mg_foto" id="mg_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Azufre (S)</h4>
												<div class="form-group">
													<!--label >¿Existe deficiencia de Azufre (S)?</label>
													<br-->
													<input type="radio" id="s_si" name="s" value="1" onchange="mostrar_s()" <?php if ($dato->s==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="s_no" name="s" value="0" onchange="mostrar_s()" <?php if ($dato->s==0){echo "checked";}?>> No
												</div>

												<div class="content_s" id="content_s">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="s_fecha" id="s_fecha" class="form-control" value="{{old('s_fecha', $dato->s_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Azufre (S)</label>
														<select class="form-control select2" name="s_deficiencia[]" id="s_deficiencia" multiple="s_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->s_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
																<option value="Frutos" <?php if(strpos($dato->s_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
																<option value="Hojas" <?php if(strpos($dato->s_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
																<option value="Flores" <?php if(strpos($dato->s_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
																<option value="Brotes" <?php if(strpos($dato->s_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="s_severidad" id="s_severidad" class="form-control" value="{{old('s_severidad', $dato->s_severidad ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="s_producto" id="s_producto" class="form-control" value="{{old('s_producto', $dato->s_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="s_fecha_aplicacion" id="s_fecha_aplicacion" class="form-control" value="{{old('s_fecha_aplicacion', $dato->s_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->s_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="s_foto" id="s_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Hierro (Fe)</h4>
												<div class="form-group">
													<!--label >¿Existe deficiencia de Hierro (Fe)?</label>
													<br-->
													<input type="radio" id="fe_si" name="fe" value="1" onchange="mostrar_fe()" <?php if ($dato->fe==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="fe_no" name="fe" value="0" onchange="mostrar_fe()" <?php if ($dato->fe==0){echo "checked";}?>> No
												</div>

												<div class="content_fe" id="content_fe">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="fe_fecha" id="fe_fecha" class="form-control" value="{{old('fe_fecha', $dato->fe_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Hierro (Fe)</label>
														<select class="form-control select2" name="fe_deficiencia[]" id="fe_deficiencia" multiple="fe_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->fe_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
																<option value="Frutos" <?php if(strpos($dato->fe_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
																<option value="Hojas" <?php if(strpos($dato->fe_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
																<option value="Flores" <?php if(strpos($dato->fe_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
																<option value="Brotes" <?php if(strpos($dato->fe_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="fe_severidad" id="fe_severidad" class="form-control" value="{{old('fe_severidad', $dato->fe_severidad ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="fe_producto" id="fe_producto" class="form-control" value="{{old('fe_producto', $dato->fe_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="fe_fecha_aplicacion" id="fe_fecha_aplicacion" class="form-control" value="{{old('fe_fecha_aplicacion', $dato->fe_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->fe_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="fe_foto" id="fe_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Zc</h4>
												<div class="form-group">
													<!--label >¿Existe deficiencia de Zc?</label>
													<br-->
													<input type="radio" id="zc_si" name="zc" value="1" onchange="mostrar_zc()" <?php if ($dato->zc==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="zc_no" name="zc" value="0" onchange="mostrar_zc()" <?php if ($dato->zc==0){echo "checked";}?>> No
												</div>

												<div class="content_zc" id="content_zc">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="zc_fecha" id="zc_fecha" class="form-control" value="{{old('zc_fecha', $dato->zc_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Zc</label>
														<select class="form-control select2" name="zc_deficiencia[]" id="zc_deficiencia" multiple="zc_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->zc_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
																<option value="Frutos" <?php if(strpos($dato->zc_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
																<option value="Hojas" <?php if(strpos($dato->zc_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
																<option value="Flores" <?php if(strpos($dato->zc_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
																<option value="Brotes" <?php if(strpos($dato->zc_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="zc_severidad" id="zc_severidad" class="form-control" value="{{old('zc_severidad', $dato->zc_severidad ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="zc_producto" id="zc_producto" class="form-control" value="{{old('zc_producto', $dato->zc_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="zc_fecha_aplicacion" id="zc_fecha_aplicacion" class="form-control" value="{{old('zc_fecha_aplicacion', $dato->zc_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->zc_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="zc_foto" id="zc_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Cobre (Cu)</h4>
												<div class="form-group">
													<!--label >¿Existe deficiencia de Cobre (Cu)?</label>
													<br-->
													<input type="radio" id="cu_si" name="cu" value="1" onchange="mostrar_cu()" <?php if ($dato->cu==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="cu_no" name="cu" value="0" onchange="mostrar_cu()" <?php if ($dato->cu==0){echo "checked";}?>> No
												</div>

												<div class="content_cu" id="content_cu">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="cu_fecha" id="cu_fecha" class="form-control" value="{{old('cu_fecha', $dato->cu_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Cobre (Cu)</label>
														<select class="form-control select2" name="cu_deficiencia[]" id="cu_deficiencia" multiple="cu_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->cu_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
																<option value="Frutos" <?php if(strpos($dato->cu_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
																<option value="Hojas" <?php if(strpos($dato->cu_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
																<option value="Flores" <?php if(strpos($dato->cu_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
																<option value="Brotes" <?php if(strpos($dato->cu_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="cu_severidad" id="cu_severidad" class="form-control" value="{{old('cu_severidad', $dato->cu_severidad ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="cu_producto" id="cu_producto" class="form-control" value="{{old('cu_producto', $dato->cu_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="cu_fecha_aplicacion" id="cu_fecha_aplicacion" class="form-control" value="{{old('cu_fecha_aplicacion', $dato->cu_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->cu_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="cu_foto" id="cu_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
												</div>


												<br>
												<h4 style="color:white">Deficiencia: Boro (B)</h4>
												<div class="form-group">
													<!--label >¿Existe deficiencia de Boro (B)?</label>
													<br-->
													<input type="radio" id="b_si" name="b" value="1" onchange="mostrar_b()" <?php if ($dato->b==1){echo "checked";}?>> Si &nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" id="b_no" name="b" value="0" onchange="mostrar_b()" <?php if ($dato->b==0){echo "checked";}?>> No
												</div>

												<div class="content_b" id="content_b">
													<div class="form-group">
														<label >Fecha</label>
														<input type="date" name="b_fecha" id="b_fecha" class="form-control" value="{{old('b_fecha', $dato->b_fecha ?? '')}}" required>
													</div>

													<div class="form-group">
														<label>Zona de sintoma / deficiencia de Boro (B)</label>
														<select class="form-control select2" name="b_deficiencia[]" id="b_deficiencia" multiple="b_deficiencia[]" data-placeholder="Selecione una o varias" required>
																<option value="Tallo" <?php if(strpos($dato->b_deficiencia, 'Tallo') !== false) {echo "selected";}?>>Tallo</option>
																<option value="Frutos" <?php if(strpos($dato->b_deficiencia, 'Frutos') !== false) {echo "selected";}?>>Frutos</option>
																<option value="Hojas" <?php if(strpos($dato->b_deficiencia, 'Hojas') !== false) {echo "selected";}?>>Hojas</option>
																<option value="Flores" <?php if(strpos($dato->b_deficiencia, 'Flores') !== false) {echo "selected";}?>>Flores</option>
																<option value="Brotes" <?php if(strpos($dato->b_deficiencia, 'Brotes') !== false) {echo "selected";}?>>Brotes</option>
														</select>
													</div>

													<div class="form-group">
														<label >Porcentaje de severidad (%)</label>
														<input type="number" min="0" max="100" step="0.01" name="b_severidad" id="b_severidad" class="form-control" value="{{old('b_severidad', $dato->b_severidad ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Sugerencia de producto para aplicación</label>
														<input type="text" name="b_producto" id="b_producto" class="form-control" value="{{old('b_producto', $dato->b_producto ?? '')}}" required>
													</div>

													<div class="form-group">
														<label >Fecha final de aplicación</label>
														<input type="date" name="b_fecha_aplicacion" id="b_fecha_aplicacion" class="form-control" value="{{old('b_fecha_aplicacion', $dato->b_fecha_aplicacion ?? '')}}" required>
													</div>

                          <br>
                          <div class="row col-md-12">
                            <div class="attachment-block clearfix col-md-3 col-xs-4">
                              <label >Foto anterior</label>
															<img class="attachment-img" src="{{$dato->b_foto}}" alt="Attachment Image">
                            </div>
                            <div class="col-md-9 col-xs-8">
                              <label >Actualizar fotografía</label>
                              <input name="b_foto" id="b_foto" type="file" class="text-white" accept="image/*"/>
                            </div>
                          </div>
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

@section('scripts')

@parent
<script type="text/javascript">
	window.onload=function() {
		//Ejecutamos todas las funciones
		mostrar_p();
		mostrar_k();
		mostrar_ca();
		mostrar_mg();
		mostrar_s();
		mostrar_fe();
		mostrar_zc();
		mostrar_cu();
		mostrar_b();
	}
</script>

<script type="text/javascript">
  function mostrar_p() {
		p_si = document.getElementById("p_si");
		if (p_si.checked) {
			document.getElementById("content_p").style.display='block';
			document.getElementById("p_fecha").required = true;
			document.getElementById("p_deficiencia").required = true;
			document.getElementById("p_severidad").required = true;
			document.getElementById("p_producto").required = true;
			document.getElementById("p_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_p").style.display='none';
			document.getElementById("p_fecha").required = false;
			document.getElementById("p_deficiencia").required = false;
			document.getElementById("p_severidad").required = false;
			document.getElementById("p_producto").required = false;
			document.getElementById("p_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_k() {
		k_si = document.getElementById("k_si");
		if (k_si.checked) {
			document.getElementById("content_k").style.display='block';
			document.getElementById("k_fecha").required = true;
			document.getElementById("k_deficiencia").required = true;
			document.getElementById("k_severidad").required = true;
			document.getElementById("k_producto").required = true;
			document.getElementById("k_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_k").style.display='none';
			document.getElementById("k_fecha").required = false;
			document.getElementById("k_deficiencia").required = false;
			document.getElementById("k_severidad").required = false;
			document.getElementById("k_producto").required = false;
			document.getElementById("k_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_ca() {
		ca_si = document.getElementById("ca_si");
		if (ca_si.checked) {
			document.getElementById("content_ca").style.display='block';
			document.getElementById("ca_fecha").required = true;
			document.getElementById("ca_deficiencia").required = true;
			document.getElementById("ca_severidad").required = true;
			document.getElementById("ca_producto").required = true;
			document.getElementById("ca_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_ca").style.display='none';
			document.getElementById("ca_fecha").required = false;
			document.getElementById("ca_deficiencia").required = false;
			document.getElementById("ca_severidad").required = false;
			document.getElementById("ca_producto").required = false;
			document.getElementById("ca_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_mg() {
		mg_si = document.getElementById("mg_si");
		if (mg_si.checked) {
			document.getElementById("content_mg").style.display='block';
			document.getElementById("mg_fecha").required = true;
			document.getElementById("mg_deficiencia").required = true;
			document.getElementById("mg_severidad").required = true;
			document.getElementById("mg_producto").required = true;
			document.getElementById("mg_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_mg").style.display='none';
			document.getElementById("mg_fecha").required = false;
			document.getElementById("mg_deficiencia").required = false;
			document.getElementById("mg_severidad").required = false;
			document.getElementById("mg_producto").required = false;
			document.getElementById("mg_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_s() {
		s_si = document.getElementById("s_si");
		if (s_si.checked) {
			document.getElementById("content_s").style.display='block';
			document.getElementById("s_fecha").required = true;
			document.getElementById("s_deficiencia").required = true;
			document.getElementById("s_severidad").required = true;
			document.getElementById("s_producto").required = true;
			document.getElementById("s_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_s").style.display='none';
			document.getElementById("s_fecha").required = false;
			document.getElementById("s_deficiencia").required = false;
			document.getElementById("s_severidad").required = false;
			document.getElementById("s_producto").required = false;
			document.getElementById("s_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_fe() {
		fe_si = document.getElementById("fe_si");
		if (fe_si.checked) {
			document.getElementById("content_fe").style.display='block';
			document.getElementById("fe_fecha").required = true;
			document.getElementById("fe_deficiencia").required = true;
			document.getElementById("fe_severidad").required = true;
			document.getElementById("fe_producto").required = true;
			document.getElementById("fe_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_fe").style.display='none';
			document.getElementById("fe_fecha").required = false;
			document.getElementById("fe_deficiencia").required = false;
			document.getElementById("fe_severidad").required = false;
			document.getElementById("fe_producto").required = false;
			document.getElementById("fe_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_zc() {
		zc_si = document.getElementById("zc_si");
		if (zc_si.checked) {
			document.getElementById("content_zc").style.display='block';
			document.getElementById("zc_fecha").required = true;
			document.getElementById("zc_deficiencia").required = true;
			document.getElementById("zc_severidad").required = true;
			document.getElementById("zc_producto").required = true;
			document.getElementById("zc_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_zc").style.display='none';
			document.getElementById("zc_fecha").required = false;
			document.getElementById("zc_deficiencia").required = false;
			document.getElementById("zc_severidad").required = false;
			document.getElementById("zc_producto").required = false;
			document.getElementById("zc_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_cu() {
		cu_si = document.getElementById("cu_si");
		if (cu_si.checked) {
			document.getElementById("content_cu").style.display='block';
			document.getElementById("cu_fecha").required = true;
			document.getElementById("cu_deficiencia").required = true;
			document.getElementById("cu_severidad").required = true;
			document.getElementById("cu_producto").required = true;
			document.getElementById("cu_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_cu").style.display='none';
			document.getElementById("cu_fecha").required = false;
			document.getElementById("cu_deficiencia").required = false;
			document.getElementById("cu_severidad").required = false;
			document.getElementById("cu_producto").required = false;
			document.getElementById("cu_fecha_aplicacion").required = false;
		}
  }
</script>

<script type="text/javascript">
  function mostrar_b() {
		b_si = document.getElementById("b_si");
		if (b_si.checked) {
			document.getElementById("content_b").style.display='block';
			document.getElementById("b_fecha").required = true;
			document.getElementById("b_deficiencia").required = true;
			document.getElementById("b_severidad").required = true;
			document.getElementById("b_producto").required = true;
			document.getElementById("b_fecha_aplicacion").required = true;
		}
		else {
			document.getElementById("content_b").style.display='none';
			document.getElementById("b_fecha").required = false;
			document.getElementById("b_deficiencia").required = false;
			document.getElementById("b_severidad").required = false;
			document.getElementById("b_producto").required = false;
			document.getElementById("b_fecha_aplicacion").required = false;
		}
  }
</script>
@endsection

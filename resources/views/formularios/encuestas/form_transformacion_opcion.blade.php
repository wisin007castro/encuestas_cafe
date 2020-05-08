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
              <div class="col-sm-8 col-sm-offset-2 myform-cont" >

                     <div class="myform-top">
                        <div class="myform-top-left">
                           {{-- <img  src="" class="img-responsive logo" /> --}}
                          <h3>Transformación</h3>
                            <p>Por favor pulse sobre la cada uno de los botones para llenar las diferentes encuestas</p>
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

						<div class="myform-bottom">
							<form action="{{ url('form_cosecha_tabla') }}"  method="post">
								<br>
								<button type="submit" style="font-size: 16px; padding: 30px;width: 100%; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87CEEB), color-stop(100%,#4682B4)); -webkit-box-shadow: inset 0px 0px 6px #fff; border-radius: 10px;">
									<div class="">
										<div class="">
											<span  style='font-size: 20px; color:black; height: 50px; font-weight:bold; text-align:center' class="">Cosecha</span>
											<br>
										</div>
									</div>
								</button>
							</form>

							<form action="{{ url('form_post_cosecha_tabla') }}"  method="post">
								<br>
								<button type="submit" style="font-size: 16px; padding: 30px;width: 100%; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87CEEB), color-stop(100%,#4682B4)); -webkit-box-shadow: inset 0px 0px 6px #fff; border-radius: 10px;">
									<div class="">
										<div class="">
											<span  style='font-size: 20px; color:black; height: 50px; font-weight:bold; text-align:center' class="">Post Cosecha</span>
											<br>
										</div>
									</div>
								</button>
							</form>

							<form action="{{ url('form_secado_tabla') }}"  method="post">
								<br>
								<button type="submit" style="font-size: 16px; padding: 30px;width: 100%; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87CEEB), color-stop(100%,#4682B4)); -webkit-box-shadow: inset 0px 0px 6px #fff; border-radius: 10px;">
									<div class="">
										<div class="">
											<span  style='font-size: 20px; color:black; height: 50px; font-weight:bold; text-align:center' class="">Secado</span>
											<br>
										</div>
									</div>
								</button>
							</form>

						</div>

          </div>
        </div>

    </div>
  </div>

</section>

</section>
@endsection

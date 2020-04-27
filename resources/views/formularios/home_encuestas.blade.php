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
                          <h3>Mesas de Votación a llenar</h3>
                            <p>Por favor pulse sobre la mesa de votación a llenar</p>
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

<div class="row">
	<div class="col-md-6">
		<div class="myform-bottom">
										
			<form action="{{ url('form_votar_seleccionar_tipo') }}"  method="post">
				<input type="hidden" name="id_mesa" value="">
				<br>
				
				<button type="submit" style="font-size: 16px; padding: 30px;width: 100%; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87CEEB), color-stop(100%,#4682B4)); -webkit-box-shadow: inset 0px 0px 6px #fff; border-radius: 10px;">
					<div class="">
						<div class="">
							
					<span  style='font-size: 20px; color:black; height: 50px; font-weight:bold; text-align:center' class="">MESA 10</span>
					<br><span class="info-box-number">(1010101010)</span>
					<span  style='font-size: 15px; color:black; font-weight:bold; text-align:center' class="">[10101010101010 ]</span>		

					<br>
						<span class="info-box-number">Votos Uninominales:</span>

									<i style='font-size: 22px; color:yellow; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Incompleto sin Foto</span>

									<i style='font-size: 22px; color:yellow; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Incompleto con Foto</span>

									<i style='font-size: 22px; color:yellow; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Completo sin Foto</span>

									<i style='font-size: 22px; color:yellow; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Completo con Foto</span>

								<br>
								<i style='font-size: 22px; color:red; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Rev.&nbspValores</span>
							
						</div>
						<!-- /.info-box-content -->
						</div>
				</button>
			</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="myform-bottom">
										
			<form action="{{ url('form_votar_seleccionar_tipo') }}"  method="post">
				<input type="hidden" name="id_mesa" value="">
				<br>
				
				<button type="submit" style="font-size: 16px; padding: 30px;width: 100%; background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#87CEEB), color-stop(100%,#4682B4)); -webkit-box-shadow: inset 0px 0px 6px #fff; border-radius: 10px;">
					<div class="">
						<div class="">
							
					<span  style='font-size: 20px; color:black; height: 50px; font-weight:bold; text-align:center' class="">MESA 10</span>
					<br><span class="info-box-number">(1010101010)</span>
					<span  style='font-size: 15px; color:black; font-weight:bold; text-align:center' class="">[10101010101010 ]</span>
					<br>
					<span class="info-box-number">Votos Presidenciales:</span>
					<i style='font-size: 22px; color:white; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Pendiente</span>
					<i style='font-size: 22px; color:yellow; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Incompleto sin Foto</span>
					<i style='font-size: 22px; color:yellow; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Incompleto con Foto</span>

					<i style='font-size: 22px; color:red; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Rev.&nbspValores</span>
					<i style='font-size: 22px; color:white; height: 50px; font-weight:bold; text-align:center' class="fa fa-circle"></i><span style='font-size: 18px; height: 50px; text-align:center'>  Pendiente</span>

						</div>
						<!-- /.info-box-content -->
						</div>
				</button>
			</form>
		</div>
	</div>
</div>

              </div>
            </div>

        </div>
      </div>

</section>

</section>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DateTime;

class FormEncuestasController extends Controller
{
    public function home_encuestas(){
        return view("formularios.home_encuestas");
    }

    public function quienes_somos(){
        return view("encuestas.quienes_somos");
    }

    public function contactos(){
        return view("encuestas.contactos");
    }

    public function form_enc_controles_maleza(){
        return view("formularios.form_enc_controles_maleza");
    }

    public function form_podas_control_opcion(){
        return view("formularios.encuestas.form_podas_control_opcion");
    }

    public function form_densidad_tabla(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->where('object_id', Auth::user()->object_id)->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
    }

    public function form_sist_agroforestales_tabla(){
        $datos = \DB::table('enc_sist_agroforestales')->orderBy('id_sist_agroforestal', 'desc')->where('object_id', Auth::user()->object_id)->get();
        return view("listados.encuesta.listado_sist_agroforestales", compact('datos'));
    }


    public function form_sist_agroforestales_agregar(){
        return view("formularios.encuestas.form_sist_agroforestales_agregar");
    }

    public function listado_densidad(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
    }

    public function form_preparacion_tabla(){
        $datos = \DB::table('enc_preparaciones')->where('object_id', Auth::user()->object_id)->orderBy('id_preparacion', 'desc')->get();
        return view("listados.encuesta.form_preparacion_tabla", compact('datos'));
    }

    public function form_podas_tabla(){
        $datos = \DB::table('enc_podas')->where('object_id', Auth::user()->object_id)->orderBy('id_poda', 'desc')->get();
        return view("listados.encuesta.form_podas_tabla", compact('datos'));
    }

    public function form_controles_tabla(){
        $datos = \DB::table('enc_controles_maleza')->where('object_id', Auth::user()->object_id)->orderBy('id_control_maleza', 'desc')->get();
        return view("listados.encuesta.form_controles_tabla", compact('datos'));
    }

    //FORMS AGREGAR
    public function form_densidad_agregar(){
        return view("formularios.encuestas.form_densidad_agregar");
    }

    public function form_preparacion_agregar(){
        return view("formularios.encuestas.form_preparacion_agregar");
    }
    public function form_podas_agregar(){
        return view("formularios.encuestas.form_podas_agregar");
    }
    public function form_controles_agregar(){
        return view("formularios.encuestas.form_controles_agregar");
    }








        //FORMS GUARDAR
        public function densidad_guardar(Request $request){
            //dd($request);
            $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));
            \DB::table('enc_densidad')->insert([
                ['object_id' => Auth::user()->object_id,
                 'ano' => $request->ano,
                 'densidad' => $request->densidad,
                 'superficie' => $request->superficie,
                 'cantidad_plantas' => $request->cantidad_plantas,
                 'plantas_muertas' => $request->plantas_muertas,
                 'plantas_efectivas' => $request->plntas_efectivas,
                 'created_at' => $tiempo_actual,
                 'updated_at' => $tiempo_actual,
                 'activo' => 1]
            ]);
            return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Densidad de Plantación de Café Guardada Exitosamente');
        }

    public function preparacion_guardar(Request $request){
        $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));
        if($request->quema == 1){
            $con_quema = 1;
            $sin_quema = 0;

        } else{
            $con_quema = 0;
            $sin_quema = 1;
        }

        \DB::table('enc_preparaciones')->insert([
            ['object_id' => Auth::user()->object_id,
                'fecha' => $request->fecha,
                'con_quema' => $con_quema,
                'sin_quema' => $sin_quema,
                'created_at' => $tiempo_actual,
                'updated_at' => $tiempo_actual,
                'activo' => 1
                ]
        ]);
        return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Información Básica (Zona de Plantación) Guardada Exitosamente');
    }

    public function podas_guardar(Request $request){
        $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

        //FORMACION DE PLANTAS
        if ($request->form_planta == 1) {
            $form_planta_fecha = $request->form_planta_fecha;
            $form_planta_fecha_final = $request->form_planta_fecha_final;
          }
          else {
            $form_planta_fecha = "0000-00-00";
            $form_planta_fecha_final = "0000-00-00";
          }

        //MANTENIMIENTO
        if ($request->mantenimiento == 1) {
            $mantenimiento_fecha = $request->mantenimiento_fecha;
            $mantenimiento_fecha_final = $request->mantenimiento_fecha_final;
          }
          else {
            $mantenimiento_fecha = "0000-00-00";
            $mantenimiento_fecha_final = "0000-00-00";
          }

        //SELECCION DE BROTES
        if ($request->sel_brotes == 1) {
            $sel_brotes_fecha = $request->sel_brotes_fecha;
            $sel_brotes_fecha_final = $request->sel_brotes_fecha_final;
          }
          else {
            $sel_brotes_fecha = "0000-00-00";
            $sel_brotes_fecha_final = "0000-00-00";
          }

        //REHABILITACION
        if ($request->rehabilitacion == 1) {
            $rehabilitacion_fecha = $request->rehabilitacion_fecha;
            $rehabilitacion_fecha_final = $request->rehabilitacion_fecha_final;
          }
          else {
            $rehabilitacion_fecha = "0000-00-00";
            $rehabilitacion_fecha_final = "0000-00-00";
          }

        //RENOVACION
        if ($request->renovacion == 1) {
            $renovacion_fecha = $request->renovacion_fecha;
            $renovacion_fecha_final = $request->renovacion_fecha_final;
          }
          else {
            $renovacion_fecha = "0000-00-00";
            $renovacion_fecha_final = "0000-00-00";
          }

        //DESHOJE Y DESPUNTE
        if ($request->deshoje_despunte == 1) {
            $deshoje_despunte_fecha = $request->deshoje_despunte_fecha;
            $deshoje_despunte_fecha_final = $request->deshoje_despunte_fecha_final;
          }
          else {
            $deshoje_despunte_fecha = "0000-00-00";
            $deshoje_despunte_fecha_final = "0000-00-00";
          }

          \DB::table('enc_podas')->insert([
            [
                'object_id' => Auth::user()->object_id,
                'form_planta' => $request->form_planta,
                'form_planta_fecha' => $form_planta_fecha,
                'form_planta_fecha_final' => $form_planta_fecha_final,
                'mantenimiento' => $request->mantenimiento,
                'mantenimiento_fecha' => $mantenimiento_fecha,
                'mantenimiento_fecha_final' => $mantenimiento_fecha_final,
                'sel_brotes' => $request->sel_brotes,
                'sel_brotes_fecha' => $sel_brotes_fecha,
                'sel_brotes_fecha_final' => $sel_brotes_fecha_final,
                'rehabilitacion' => $request->rehabilitacion,
                'rehabilitacion_fecha' => $rehabilitacion_fecha,
                'rehabilitacion_fecha_final' => $rehabilitacion_fecha_final,
                'renovacion' => $request->renovacion,
                'renovacion_fecha' => $renovacion_fecha,
                'renovacion_fecha_final' => $renovacion_fecha_final,
                'deshoje_despunte' => $request->deshoje_despunte,
                'deshoje_despunte_fecha' => $deshoje_despunte_fecha,
                'deshoje_despunte_fecha_final' => $deshoje_despunte_fecha_final,
                'created_at' => $tiempo_actual,
                'updated_at' => $tiempo_actual,
                'activo' => 1
                ]
            ]);

            return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Podas Guardada Exitosamente');
    }

    public function controles_guardar(Request $request){
        $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

        //METODO BIOLOGICO
        if ($request->biologico == 1) {
            $biologico_fecha = $request->biologico_fecha;
            $biologico_producto = $request->biologico_producto;
        }
        else {
            $biologico_fecha = "0000-00-00";
            $biologico_producto = "";
        }

        //METODO QUIMICO
        if ($request->quimico == 1) {
            $quimico_fecha = $request->quimico_fecha;
            $quimico_producto = $request->quimico_producto;
        }
        else {
            $quimico_fecha = "0000-00-00";
            $quimico_producto = "";
        }


        //METODO MECANICO
        if ($request->mecanico == 1) {
            $mecanico_fecha = $request->mecanico_fecha;
            $mecanico_producto = $request->mecanico_producto;
        }
        else {
            $mecanico_fecha = "0000-00-00";
            $mecanico_producto = "";
        }
        \DB::table('enc_controles_maleza')->insert([
            [
                'object_id' => Auth::user()->object_id,
                'biologico' => $request->biologico,
                'biologico_fecha' => $biologico_fecha,
                'biologico_producto' => $biologico_producto,
                'quimico' => $request->quimico,
                'quimico_fecha' => $quimico_fecha,
                'quimico_producto' => $quimico_producto,
                'mecanico' => $request->mecanico,
                'mecanico_fecha' => $mecanico_fecha,
                'mecanico_producto' => $mecanico_producto,
                'created_at' => $tiempo_actual,
                'updated_at' => $tiempo_actual,
                'activo' => 1
                ]
            ]);
        return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Control de Malezas guardada exitosamente');
    }

        public function sist_agroforestales_guardar(Request $request){
            $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

            //Tomamos los valores y les asignamos valores según corresponda
            if ($request->pacay == 1) {
              $pacay_fecha_siembra = $request->pacay_fecha_siembra;
              $pacay_cantidad = $request->pacay_cantidad;
              $pacay_permanente = $request->pacay_permanente;
            }
            else {
              $pacay_fecha_siembra = "0000-00-00";
              $pacay_cantidad = 0;
              $pacay_permanente = 0;
            }

            if ($request->platano == 1) {
              $platano_fecha_siembra = $request->platano_fecha_siembra;
              $platano_cantidad = $request->platano_cantidad;
              $platano_permanente = $request->platano_permanente;
            }
            else {
              $platano_fecha_siembra = "0000-00-00";
              $platano_cantidad = 0;
              $platano_permanente = 0;
            }

            if ($request->citricos == 1) {
              $citricos_fecha_siembra = $request->citricos_fecha_siembra;
              $citricos_cantidad = $request->citricos_cantidad;
              $citricos_permanente = $request->citricos_permanente;
            }
            else {
              $citricos_fecha_siembra = "0000-00-00";
              $citricos_cantidad = 0;
              $citricos_permanente = 0;
            }

            if ($request->maderables == 1) {
              $maderables_fecha_siembra = $request->maderables_fecha_siembra;
              $maderables_cantidad = $request->maderables_cantidad;
              $maderables_permanente = $request->maderables_permanente;
            }
            else {
              $maderables_fecha_siembra = "0000-00-00";
              $maderables_cantidad = 0;
              $maderables_permanente = 0;
            }

            if ($request->frutas_amazonicas == 1) {
              $frutas_amazonicas_fecha_siembra = $request->frutas_amazonicas_fecha_siembra;
              $frutas_amazonicas_cantidad = $request->frutas_amazonicas_cantidad;
              $frutas_amazonicas_permanente = $request->frutas_amazonicas_permanente;
            }
            else {
              $frutas_amazonicas_fecha_siembra = "0000-00-00";
              $frutas_amazonicas_cantidad = 0;
              $frutas_amazonicas_permanente = 0;
            }

            if ($request->otros == 1) {
              $otros_descripcion = $request->otros_descripcion;
              $otros_fecha_siembra = $request->otros_fecha_siembra;
              $otros_cantidad = $request->otros_cantidad;
              $otros_permanente = $request->otros_permanente;
            }
            else {
              $otros_descripcion = "";
              $otros_fecha_siembra = "0000-00-00";
              $otros_cantidad = 0;
              $otros_permanente = 0;
            }

            \DB::table('enc_sist_agroforestales')->insert([
                ['object_id' => Auth::user()->object_id,
                 'ano' => $request->ano,
                 'pacay' => $request->pacay,
                 'pacay_fecha_siembra' => $pacay_fecha_siembra,
                 'pacay_cantidad' => $pacay_cantidad,
                 'pacay_permanente' => $pacay_permanente,
                 'platano' => $request->platano,
                 'platano_fecha_siembra' => $platano_fecha_siembra,
                 'platano_cantidad' => $platano_cantidad,
                 'platano_permanente' => $platano_permanente,
                 'citricos' => $request->citricos,
                 'citricos_fecha_siembra' => $citricos_fecha_siembra,
                 'citricos_cantidad' => $citricos_cantidad,
                 'citricos_permanente' => $citricos_permanente,
                 'maderables' => $request->maderables,
                 'maderables_fecha_siembra' => $maderables_fecha_siembra,
                 'maderables_cantidad' => $maderables_cantidad,
                 'maderables_permanente' => $maderables_permanente,
                 'frutas_amazonicas' => $request->frutas_amazonicas,
                 'frutas_amazonicas_fecha_siembra' => $frutas_amazonicas_fecha_siembra,
                 'frutas_amazonicas_cantidad' => $frutas_amazonicas_cantidad,
                 'frutas_amazonicas_permanente' => $frutas_amazonicas_permanente,
                 'otros' => $request->otros,
                 'otros_descripcion' => $otros_descripcion,
                 'otros_fecha_siembra' => $otros_fecha_siembra,
                 'otros_cantidad' => $otros_cantidad,
                 'otros_permanente' => $otros_permanente,
                 'created_at' => $tiempo_actual,
                 'updated_at' => $tiempo_actual,
                 'activo' => 1]
            ]);
            return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Sistemas Agroforestales Guardada Exitosamente');
        }



    //FORMS EDITAR
    public function form_densidad_editar($id){
      $id_densidad = base64_decode($id);
      $dato = \DB::table('enc_densidad')->where('id_densidad', $id_densidad)->first();
      return view("formularios.encuestas.form_densidad_editar", compact('dato'));
    }

    public function form_sist_agroforestales_editar($id){
      $id_sist_agroforestal = base64_decode($id);
      $dato = \DB::table('enc_sist_agroforestales')->where('id_sist_agroforestal', $id_sist_agroforestal)->first();
      return view("formularios.encuestas.form_sist_agroforestales_editar", compact('dato'));
    }

    public function form_preparacion_editar($id){
        $id = base64_decode($id);
        $dato = \DB::table('enc_preparaciones')->where('id_preparacion', $id)->first();
        return view("formularios.encuestas.form_preparacion_editar", compact('dato'));
    }
    public function form_podas_editar($id){
        $id = base64_decode($id);
        $dato = \DB::table('enc_podas')->where('id_poda', $id)->first();
        return view("formularios.encuestas.form_podas_editar", compact('dato'));
    }

    public function form_controles_editar($id){
        $id = base64_decode($id);
        $dato = \DB::table('enc_controles_maleza')->where('id_control_maleza', $id)->first();
        return view("formularios.encuestas.form_controles_editar", compact('dato'));
    }




    //FORMS ACTUALIZAR
    public function densidad_actualizar(Request $request, $id){

      $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

      \DB::table('enc_densidad')
            ->where('id_densidad', $id)
            ->update(['ano' => $request->ano,
                       'densidad' => $request->densidad,
                       'superficie' => $request->superficie,
                       'cantidad_plantas' => $request->cantidad_plantas,
                       'plantas_muertas' => $request->plantas_muertas,
                       'plantas_efectivas' => $request->plntas_efectivas,
                       'updated_at' => $tiempo_actual]);

       return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Densidad de Plantación de Café Actualizada Exitosamente');
    }

    public function sist_agroforestales_actualizar(Request $request, $id){
      $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

      //Tomamos los valores y les asignamos valores según corresponda
      if ($request->pacay == 1) {
        $pacay_fecha_siembra = $request->pacay_fecha_siembra;
        $pacay_cantidad = $request->pacay_cantidad;
        $pacay_permanente = $request->pacay_permanente;
      }
      else {
        $pacay_fecha_siembra = "0000-00-00";
        $pacay_cantidad = 0;
        $pacay_permanente = 0;
      }

      if ($request->platano == 1) {
        $platano_fecha_siembra = $request->platano_fecha_siembra;
        $platano_cantidad = $request->platano_cantidad;
        $platano_permanente = $request->platano_permanente;
      }
      else {
        $platano_fecha_siembra = "0000-00-00";
        $platano_cantidad = 0;
        $platano_permanente = 0;
      }

      if ($request->citricos == 1) {
        $citricos_fecha_siembra = $request->citricos_fecha_siembra;
        $citricos_cantidad = $request->citricos_cantidad;
        $citricos_permanente = $request->citricos_permanente;
      }
      else {
        $citricos_fecha_siembra = "0000-00-00";
        $citricos_cantidad = 0;
        $citricos_permanente = 0;
      }

      if ($request->maderables == 1) {
        $maderables_fecha_siembra = $request->maderables_fecha_siembra;
        $maderables_cantidad = $request->maderables_cantidad;
        $maderables_permanente = $request->maderables_permanente;
      }
      else {
        $maderables_fecha_siembra = "0000-00-00";
        $maderables_cantidad = 0;
        $maderables_permanente = 0;
      }

      if ($request->frutas_amazonicas == 1) {
        $frutas_amazonicas_fecha_siembra = $request->frutas_amazonicas_fecha_siembra;
        $frutas_amazonicas_cantidad = $request->frutas_amazonicas_cantidad;
        $frutas_amazonicas_permanente = $request->frutas_amazonicas_permanente;
      }
      else {
        $frutas_amazonicas_fecha_siembra = "0000-00-00";
        $frutas_amazonicas_cantidad = 0;
        $frutas_amazonicas_permanente = 0;
      }

      if ($request->otros == 1) {
        $otros_descripcion = $request->otros_descripcion;
        $otros_fecha_siembra = $request->otros_fecha_siembra;
        $otros_cantidad = $request->otros_cantidad;
        $otros_permanente = $request->otros_permanente;
      }
      else {
        $otros_descripcion = "";
        $otros_fecha_siembra = "0000-00-00";
        $otros_cantidad = 0;
        $otros_permanente = 0;
      }

      \DB::table('enc_sist_agroforestales')->insert([
          ['object_id' => Auth::user()->object_id,
           'ano' => $request->ano,
           'pacay' => $request->pacay,
           'pacay_fecha_siembra' => $pacay_fecha_siembra,
           'pacay_cantidad' => $pacay_cantidad,
           'pacay_permanente' => $pacay_permanente,
           'platano' => $request->platano,
           'platano_fecha_siembra' => $platano_fecha_siembra,
           'platano_cantidad' => $platano_cantidad,
           'platano_permanente' => $platano_permanente,
           'citricos' => $request->citricos,
           'citricos_fecha_siembra' => $citricos_fecha_siembra,
           'citricos_cantidad' => $citricos_cantidad,
           'citricos_permanente' => $citricos_permanente,
           'maderables' => $request->maderables,
           'maderables_fecha_siembra' => $maderables_fecha_siembra,
           'maderables_cantidad' => $maderables_cantidad,
           'maderables_permanente' => $maderables_permanente,
           'frutas_amazonicas' => $request->frutas_amazonicas,
           'frutas_amazonicas_fecha_siembra' => $frutas_amazonicas_fecha_siembra,
           'frutas_amazonicas_cantidad' => $frutas_amazonicas_cantidad,
           'frutas_amazonicas_permanente' => $frutas_amazonicas_permanente,
           'otros' => $request->otros,
           'otros_descripcion' => $otros_descripcion,
           'otros_fecha_siembra' => $otros_fecha_siembra,
           'otros_cantidad' => $otros_cantidad,
           'otros_permanente' => $otros_permanente,
           'created_at' => $tiempo_actual,
           'updated_at' => $tiempo_actual,
           'activo' => 1]
      ]);

      \DB::table('enc_densidad')
            ->where('id_densidad', $id)
            ->update(['ano' => $request->ano,
                      'pacay' => $request->pacay,
                      'pacay_fecha_siembra' => $pacay_fecha_siembra,
                      'pacay_cantidad' => $pacay_cantidad,
                      'pacay_permanente' => $pacay_permanente,
                      'platano' => $request->platano,
                      'platano_fecha_siembra' => $platano_fecha_siembra,
                      'platano_cantidad' => $platano_cantidad,
                      'platano_permanente' => $platano_permanente,
                      'citricos' => $request->citricos,
                      'citricos_fecha_siembra' => $citricos_fecha_siembra,
                      'citricos_cantidad' => $citricos_cantidad,
                      'citricos_permanente' => $citricos_permanente,
                      'maderables' => $request->maderables,
                      'maderables_fecha_siembra' => $maderables_fecha_siembra,
                      'maderables_cantidad' => $maderables_cantidad,
                      'maderables_permanente' => $maderables_permanente,
                      'frutas_amazonicas' => $request->frutas_amazonicas,
                      'frutas_amazonicas_fecha_siembra' => $frutas_amazonicas_fecha_siembra,
                      'frutas_amazonicas_cantidad' => $frutas_amazonicas_cantidad,
                      'frutas_amazonicas_permanente' => $frutas_amazonicas_permanente,
                      'otros' => $request->otros,
                      'otros_descripcion' => $otros_descripcion,
                      'otros_fecha_siembra' => $otros_fecha_siembra,
                      'otros_cantidad' => $otros_cantidad,
                      'otros_permanente' => $otros_permanente,
                      'updated_at' => $tiempo_actual]);

       return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Sistemas Agroforestales Actualizada Exitosamente');
    }


    public function preparacion_actualizar(Request $request, $id){

        $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));
        if($request->quema == 1){
            $con_quema = 1;
            $sin_quema = 0;

        } else{
            $con_quema = 0;
            $sin_quema = 1;
        }
        $dato = \DB::table('enc_preparaciones')->where('id_preparacion', $id)->update([
            'fecha' => $request->fecha,
            'con_quema' => $con_quema,
            'sin_quema' => $sin_quema,
            'updated_at' => $tiempo_actual
        ]);
        return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Información Básica Actualizada Exitosamente');
    }


    public function podas_actualizar(Request $request, $id){
        $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

        //FORMACION DE PLANTAS
        if ($request->form_planta == 1) {
            $form_planta_fecha = $request->form_planta_fecha;
            $form_planta_fecha_final = $request->form_planta_fecha_final;
          }
          else {
            $form_planta_fecha = "0000-00-00";
            $form_planta_fecha_final = "0000-00-00";
          }

        //MANTENIMIENTO
        if ($request->mantenimiento == 1) {
            $mantenimiento_fecha = $request->mantenimiento_fecha;
            $mantenimiento_fecha_final = $request->mantenimiento_fecha_final;
          }
          else {
            $mantenimiento_fecha = "0000-00-00";
            $mantenimiento_fecha_final = "0000-00-00";
          }

        //SELECCION DE BROTES
        if ($request->sel_brotes == 1) {
            $sel_brotes_fecha = $request->sel_brotes_fecha;
            $sel_brotes_fecha_final = $request->sel_brotes_fecha_final;
          }
          else {
            $sel_brotes_fecha = "0000-00-00";
            $sel_brotes_fecha_final = "0000-00-00";
          }

        //REHABILITACION
        if ($request->rehabilitacion == 1) {
            $rehabilitacion_fecha = $request->rehabilitacion_fecha;
            $rehabilitacion_fecha_final = $request->rehabilitacion_fecha_final;
          }
          else {
            $rehabilitacion_fecha = "0000-00-00";
            $rehabilitacion_fecha_final = "0000-00-00";
          }

        //RENOVACION
        if ($request->renovacion == 1) {
            $renovacion_fecha = $request->renovacion_fecha;
            $renovacion_fecha_final = $request->renovacion_fecha_final;
          }
          else {
            $renovacion_fecha = "0000-00-00";
            $renovacion_fecha_final = "0000-00-00";
          }

        //DESHOJE Y DESPUNTE
        if ($request->deshoje_despunte == 1) {
            $deshoje_despunte_fecha = $request->deshoje_despunte_fecha;
            $deshoje_despunte_fecha_final = $request->deshoje_despunte_fecha_final;
          }
          else {
            $deshoje_despunte_fecha = "0000-00-00";
            $deshoje_despunte_fecha_final = "0000-00-00";
          }

          $dato = \DB::table('enc_podas')->where('id_poda', $id)->update([
                'form_planta' => $request->form_planta,
                'form_planta_fecha' => $form_planta_fecha,
                'form_planta_fecha_final' => $form_planta_fecha_final,
                'mantenimiento' => $request->mantenimiento,
                'mantenimiento_fecha' => $mantenimiento_fecha,
                'mantenimiento_fecha_final' => $mantenimiento_fecha_final,
                'sel_brotes' => $request->sel_brotes,
                'sel_brotes_fecha' => $sel_brotes_fecha,
                'sel_brotes_fecha_final' => $sel_brotes_fecha_final,
                'rehabilitacion' => $request->rehabilitacion,
                'rehabilitacion_fecha' => $rehabilitacion_fecha,
                'rehabilitacion_fecha_final' => $rehabilitacion_fecha_final,
                'renovacion' => $request->renovacion,
                'renovacion_fecha' => $renovacion_fecha,
                'renovacion_fecha_final' => $renovacion_fecha_final,
                'deshoje_despunte' => $request->deshoje_despunte,
                'deshoje_despunte_fecha' => $deshoje_despunte_fecha,
                'deshoje_despunte_fecha_final' => $deshoje_despunte_fecha_final,
                'updated_at' => $tiempo_actual,
            ]);

            return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Podas Actualizada Exitosamente');

    }
    public function controles_actualizar(Request $request, $id){

        $tiempo_actual = new DateTime(date('Y-m-d H:i:s'));

        //METODO BIOLOGICO
        if ($request->biologico == 1) {
            $biologico_fecha = $request->biologico_fecha;
            $biologico_producto = $request->biologico_producto;
        }
        else {
            $biologico_fecha = "0000-00-00";
            $biologico_producto = "";
        }

        //METODO QUIMICO
        if ($request->quimico == 1) {
            $quimico_fecha = $request->quimico_fecha;
            $quimico_producto = $request->quimico_producto;
        }
        else {
            $quimico_fecha = "0000-00-00";
            $quimico_producto = "";
        }

        //METODO MECANICO
        if ($request->mecanico == 1) {
            $mecanico_fecha = $request->mecanico_fecha;
            $mecanico_producto = $request->mecanico_producto;
        }
        else {
            $mecanico_fecha = "0000-00-00";
            $mecanico_producto = "";
        }

        $dato = \DB::table('enc_controles_maleza')->where('id_control_maleza', $id)->update([
        [
            'biologico' => $request->biologico,
            'biologico_fecha' => $biologico_fecha,
            'biologico_producto' => $biologico_producto,
            'quimico' => $request->quimico,
            'quimico_fecha' => $quimico_fecha,
            'quimico_producto' => $quimico_producto,
            'mecanico' => $request->mecanico,
            'mecanico_fecha' => $mecanico_fecha,
            'mecanico_producto' => $mecanico_producto,
            'updated_at' => $tiempo_actual,
            ]
        ]);
        return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Control de Malezas actualizada exitosamente');

    }


}

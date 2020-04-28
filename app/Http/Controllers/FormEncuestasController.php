<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DateTime;
use Illuminate\Support\Facades\Auth;

class FormEncuestasController extends Controller
{
    public function home_encuestas(){
        return view("formularios.home_encuestas");
    }

    public function form_enc_controles_maleza(){
        return view("formularios.form_enc_controles_maleza");
    }

    public function form_podas_control_opcion(){
        return view("formularios.encuestas.form_podas_control_opcion");
    }

    public function form_densidad_tabla(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
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
    public function form_densidad_guardar(Request $request){
        dd($request);
        // return view("formularios.encuestas.form_densidad_agregar");
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
        return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Información Básica guardada exitosamente');
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

            return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Podas guardada exitosamente');
    }

    public function controles_guardar(Request $request){

    }




    //FORMS EDITAR
    public function form_densidad_editar($id){
        $dato = \DB::table('enc_densidad')->where('id_densidad', $id)->first();
        return view("formularios.encuestas.form_densidad_editar", compact('dato'));
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
        dd($request);
        // return view("formularios.encuestas.form_densidad_agregar");
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
        return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Información Básica actualizada exitosamente');
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

            return redirect('/home_encuestas')->with('mensaje_exito', 'Encuesta de Podas guardada exitosamente');

    }
    public function controles_actualizar(Request $request, $id){

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DateTime;

class FormEncuestasController extends Controller
{
    public function home_encuestas(){
        return view("formularios.home_encuestas");
    }

    public function form_enc_controles_maleza(){
        return view("formularios.form_enc_controles_maleza");
    }

    public function form_densidad_tabla(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
    }



    public function listado_densidad(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
    }

    public function listado_preparacion(){
        $datos = \DB::table('enc_preparaciones')->orderBy('id_preparacion', 'desc')->get();
        return view("listados.encuesta.listado_preparacion", compact('datos'));
    }



    //FORMS AGREGAR
    public function form_densidad_agregar(){
        return view("formularios.encuestas.form_densidad_agregar");
    }
    public function form_preparacion_agregar(){
        return view("formularios.encuestas.form_preparacion_agregar");
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
            \DB::table('votos_presidenciales')->insert([
                ['object_id' => 1,
                 'fecha' => $request->fecha,
                 'con_quema' => $con_quema,
                 'sin_quema' => $sin_quema,
                 'created_at' => $tiempo_actual,
                 'updated_at' => $tiempo_actual]
            ]);
            return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');
        }
    




    //FORMS EDITAR
    public function form_densidad_editar($id){
        $dato = \DB::table('enc_densidad')->where('id_densidad', $id)->first();
        return view("formularios.encuestas.form_densidad_editar", compact('dato'));
    }




    //FORMS ACTUALIZAR
    public function form_densidad_actualizar(Request $request, $id){
        dd($request);
        // return view("formularios.encuestas.form_densidad_agregar");
    }


}

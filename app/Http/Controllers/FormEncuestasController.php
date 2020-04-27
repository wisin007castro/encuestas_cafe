<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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



    public function form_sist_agroforestales_agregar(){
        return view("formularios.encuestas.form_sist_agroforestales_agregar");
    }

    public function listado_densidad(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
    }



    //FORMS AGREGAR
    public function form_densidad_agregar(){
        return view("formularios.encuestas.form_densidad_agregar");
    }








        //FORMS GUARDAR
        public function form_densidad_guardar(Request $request){
            dd($request);
            // return view("formularios.encuestas.form_densidad_agregar");
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

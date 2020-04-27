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

    public function form_densidad_agregar(){
        return view("formularios.encuestas.form_densidad_agregar");
    }

    public function listado_densidad(){
        $datos = \DB::table('enc_densidad')->orderBy('id_densidad', 'desc')->get();
        return view("listados.encuesta.listado_densidad", compact('datos'));
    }



    //FORMS AGREGAR
    public function form_densidad_agregar(){
        return view("formularios.encuestas.form_densidad_agregar");
    }








    //FORMS EDITAR
    public function form_densidad_editar($id){
        return view("formularios.encuestas.form_densidad_editar");
    }

}

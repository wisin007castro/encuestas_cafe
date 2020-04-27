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

        return view("formularios.form_densidad_opcion");
    }
}

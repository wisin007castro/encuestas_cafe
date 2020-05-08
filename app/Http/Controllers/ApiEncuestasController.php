<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Encuestas\Agroforestal;
use App\Models\Encuestas\ControlMaleza;
use App\User;
use App\Models\Encuestas\Densidad;
use App\Models\Encuestas\InformacionBasica;
use App\Models\Encuestas\Poda;

class ApiEncuestasController extends Controller
{

    public function datas_informacion_basica(){
        $datas = InformacionBasica::orderBy('created_at', 'desc')->get();
        return $datas;
    }

    public function datas_densidad(){
        $datas = Densidad::orderBy('created_at', 'desc')->get();
        return $datas;
    }

    public function datas_agroforestales(){
        $datas = Agroforestal::orderBy('created_at', 'desc')->get();
        return $datas;
    }

    public function datas_podas(){
        $datas = Poda::orderBy('created_at', 'desc')->get();
        return $datas;
    }

    public function datas_control_malezas(){
        $datas = ControlMaleza::orderBy('created_at', 'desc')->get();
        return $datas;
    }

    public function servicio_informacion_basica_guardar(Request $request){

        \DB::table('enc_preparaciones')->insert([
            [
                // 'id_preparacion' => $request->id_preparacion,
                'object_id' => $request->object_id,
                'fecha' => $request->fecha,
                'con_quema' => $request->con_quema,
                'sin_quema' => $request->sin_quema,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'activo' => $request->activo
            ]
        ]);
    }

    public function servicio_densidad_guardar(Request $request){

        \DB::table('enc_densidad')->insert([
            [
                // 'id_densidad' => $request->id_densidad,
                'object_id' => $request->object_id,
                'ano' => $request->ano,
                'densidad' => $request->densidad,
                'superficie' => $request->superficie,
                'cantidad_plantas' => $request->cantidad_plantas,
                'plantas_muertas' => $request->plantas_muertas,
                'plantas_efectivas' => $request->plantas_efectivas,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'activo' => $request->activo
            ]
        ]);
    }

    public function servicio_agroforestales_guardar(Request $request){

        \DB::table('enc_sist_agroforestales')->insert([
            [
                // 'id_sist_agroforestal' => $request->id_sist_agroforestal,
                'object_id' => $request->object_id,
                'ano' => $request->ano,
                'pacay' => $request->pacay,
                'pacay_cant' => $request->pacay_cant,
                'pacay_permanente' => $request->pacay_permanente,
                'pacay_fecha_siembra' => $request->pacay_fecha_siembra,
                'platano' => $request->platano,
                'platano_cantidad' => $request->platano_cantidad,
                'platano_permanente' => $request->platano_permanente,
                'platano_fecha_siembra' => $request->platano_fecha_siembra,
                'citricos' => $request->citricos,
                'citricos_cantidad' => $request->citricos_cantidad,
                'citricos_permanente' => $request->citricos_permanente,
                'citricos_fecha_siembra' => $request->citricos_fecha_siembra,
                'maderables' => $request->maderables,
                'maderables_cantidad' => $request->maderables_cantidad,
                'maderables_permanente' => $request->maderables_permanente,
                'maderables_fecha_siembra' => $request->maderables_fecha_siembra,
                'frutas_amazonicas' => $request->frutas_amazonicas,
                'frutas_amazonicas_cantidad' => $request->frutas_amazonicas_cantidad,
                'frutas_amazonicas_permanente' => $request->frutas_amazonicas_permanente,
                'frutas_amazonicas_fecha_siembra' => $request->frutas_amazonicas_fecha_siembra,
                'otros' => $request->otros,
                'otros_descripcion' => $request->otros_descripcion,
                'otros_cantidad' => $request->otros_cantidad,
                'otros_permanente' => $request->otros_permanente,
                'otros_fecha_siembra' => $request->otros_fecha_siembra,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'activo' => $request->activo,
            ]
        ]);
    }

    public function servicio_podas_guardar(Request $request){
        \DB::table('enc_podas')->insert([
            [
                // 'id_poda' => $request->id_poda,
                'object_id' => $request->object_id,
                'form_planta' => $request->form_planta,
                'form_planta_fecha' => $request->form_planta_fecha,
                'form_planta_fecha_final' => $request->form_planta_fecha_final,
                'form_planta_foto' => $request->form_planta_foto,
                'mantenimiento' => $request->mantenimiento,
                'mantenimiento_fecha' => $request->mantenimiento_fecha,
                'mantenimiento_fecha_final' => $request->mantenimiento_fecha_final,
                'mantenimiento_foto' => $request->mantenimiento_foto,
                'sel_brotes' => $request->sel_brotes,
                'sel_brotes_fecha' => $request->sel_brotes_fecha,
                'sel_brotes_fecha_final' => $request->sel_brotes_fecha_final,
                'sel_brotes_foto' => $request->sel_brotes_foto,
                'rehabilitacion' => $request->rehabilitacion,
                'rehabilitacion_fecha' => $request->rehabilitacion_fecha,
                'rehabilitacion_fecha_final' => $request->rehabilitacion_fecha_final,
                'rehabilitacion_foto' => $request->rehabilitacion_foto,
                'renovacion' => $request->renovacion,
                'renovacion_fecha' => $request->renovacion_fecha,
                'renovacion_fecha_final' => $request->renovacion_fecha_final,
                'renovacion_foto' => $request->renovacion_foto,
                'deshoje_despunte' => $request->deshoje_despunte,
                'deshoje_despunte_fecha' => $request->deshoje_despunte_fecha,
                'deshoje_despunte_fecha_final' => $request->deshoje_despunte_fecha_final,
                'deshoje_despunte_foto' => $request->deshoje_despunte_foto,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'activo' => $request->activo,
            ]
        ]);
    }

    public function servicio_control_malezas_guardar(Request $request){
        \DB::table('enc_controles_maleza')->insert([
            [
                // 'id_control_maleza' => $request->id_control_maleza,
                'object_id' => $request->object_id,
                'biologico' => $request->biologico,
                'biologico_fecha' => $request->biologico_fecha,
                'biologico_producto' => $request->biologico_producto,
                'quimico' => $request->quimico,
                'quimico_fecha' => $request->quimico_fecha,
                'quimico_producto' => $request->quimico_producto,
                'mecanico' => $request->mecanico,
                'mecanico_fecha' => $request->mecanico_fecha,
                'mecanico_producto' => $request->mecanico_producto,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'activo' => $request->activo,
            ]
        ]);
    }

}

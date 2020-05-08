<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositorios\EncuestasCafe;

class ClienteEncuestasController extends Controller
{
    protected $encuestas;

    public function __construct(EncuestasCafe $encuestas)
    {
        $this->encuestas = $encuestas;
    }

    public function cliente_informacion_basica_datas(){
        $url = 'datas_informacion_basica';
        return $this->encuestas->datas($url);
    }

    public function cliente_densidad_datas(){
        $url = 'datas_densidad';
        return $this->encuestas->datas($url);
    }

    public function cliente_agroforestales_datas(){
        $url = 'datas_agroforestales';
        return $this->encuestas->datas($url);
    }

    public function cliente_podas_datas(){
        $url = 'datas_podas';
        return $this->encuestas->datas($url);
    }

    public function cliente_control_malezas_datas(){
        $url = 'datas_control_malezas';
        return $this->encuestas->datas($url);
    }

    public function cliente_cargar_datos(){
        // dd($this->encuestas->test_server());
        if($this->encuestas->test_server()){
            $this->cliente_informacion_basica_guardar();
            $this->cliente_densidad_guardar();
            $this->cliente_agroforestales_guardar();
            $this->cliente_podas_guardar();
            $this->cliente_control_malezas_guardar();
            return redirect('/home_encuestas')->with('mensaje_exito', 'Registros cargados al servidor Exitosamente');
        }else{
            return redirect('/home_encuestas')->with('mensaje_error', 'El servidor no esta disponible, revise su conexión');
        }
    }

    public function cliente_informacion_basica_guardar(){
        $url = 'servicio_informacion_basica_guardar';
        $datas = \DB::table('enc_preparaciones')->where('activo', 1)->get();
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $e = array();
                    $e['object_id'] = $value->object_id;
                    $e['fecha'] = $value->fecha;
                    $e['con_quema'] = $value->con_quema;
                    $e['sin_quema'] = $value->sin_quema;
                    $e['created_at'] = $value->created_at;
                    $e['updated_at'] = $value->updated_at;
                    $e['activo'] = $value->activo;
                    // dd(\DB::table('enc_preparaciones')->where('id_preparacion', $value->id_preparacion)->get());
                if($this->encuestas->guardar_data($e, $url)){
                    
                    \DB::table('enc_preparaciones')->where('id_preparacion', $value->id_preparacion)
                    ->update(['activo' => 0]);
                }
            }
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_exito', 'Registros de la Tabla Información Básica subidos al servidor Exitosamente');
            return true;
        }else{
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_error', 'No hay Registros para subir al servidor');
            return false;
        }
    }

    public function cliente_densidad_guardar(){
        $url = 'servicio_densidad_guardar';
        $datas = \DB::table('enc_densidad')->where('activo', 1)->get();
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $e = array();
                    $e['object_id'] = $value->object_id;
                    $e['ano'] = $value->ano;
                    $e['densidad'] = $value->densidad;
                    $e['superficie'] = $value->superficie;
                    $e['cantidad_plantas'] = $value->cantidad_plantas;
                    $e['plantas_muertas'] = $value->plantas_muertas;
                    $e['plantas_efectivas'] = $value->plantas_efectivas;
                    $e['created_at'] = $value->created_at;
                    $e['updated_at'] = $value->updated_at;
                    $e['activo'] = $value->activo;
                if($this->encuestas->guardar_data($e, $url)){
                    \DB::table('enc_densidad')->where('id_densidad', $value->id_densidad)
                    ->update(['activo' => 0]);
                }
            }
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_exito', 'Registros de la Tabla Densidad subidos al servidor Exitosamente');
            return true;
        }else{
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_error', 'No hay Registros para subir al servidor');
            return false;
        }
    }

    public function cliente_agroforestales_guardar(){
        $url = 'servicio_agroforestales_guardar';
        $datas = \DB::table('enc_sist_agroforestales')->where('activo', 1)->get();
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $e = array();
                    $e['object_id'] = $value->object_id;
                    $e['ano'] = $value->ano;
                    $e['pacay'] = $value->pacay;
                    $e['pacay_cant'] = $value->pacay_cant;
                    $e['pacay_permanente'] = $value->pacay_permanente;
                    $e['pacay_fecha_siembra'] = $value->pacay_fecha_siembra;
                    $e['platano'] = $value->platano;
                    $e['platano_cantidad'] = $value->platano_cantidad;
                    $e['platano_permanente'] = $value->platano_permanente;
                    $e['platano_fecha_siembra'] = $value->platano_fecha_siembra;
                    $e['citricos'] = $value->citricos;
                    $e['citricos_cantidad'] = $value->citricos_cantidad;
                    $e['citricos_permanente'] = $value->citricos_permanente;
                    $e['citricos_fecha_siembra'] = $value->citricos_fecha_siembra;
                    $e['maderables'] = $value->maderables;
                    $e['maderables_cantidad'] = $value->maderables_cantidad;
                    $e['maderables_permanente'] = $value->maderables_permanente;
                    $e['maderables_fecha_siembra'] = $value->maderables_fecha_siembra;
                    $e['frutas_amazonicas'] = $value->frutas_amazonicas;
                    $e['frutas_amazonicas_cantidad'] = $value->frutas_amazonicas_cantidad;
                    $e['frutas_amazonicas_permanente'] = $value->frutas_amazonicas_permanente;
                    $e['frutas_amazonicas_fecha_siembra'] = $value->frutas_amazonicas_fecha_siembra;
                    $e['otros'] = $value->otros;
                    $e['otros_descripcion'] = $value->otros_descripcion;
                    $e['otros_cantidad'] = $value->otros_cantidad;
                    $e['otros_permanente'] = $value->otros_permanente;
                    $e['otros_fecha_siembra'] = $value->otros_fecha_siembra;
                    $e['created_at'] = $value->created_at;
                    $e['updated_at'] = $value->updated_at;
                    $e['activo'] = $value->activo;
                if($this->encuestas->guardar_data($e, $url)){
                    \DB::table('enc_sist_agroforestales')->where('id_sist_agroforestal', $value->id_sist_agroforestal )
                    ->update(['activo' => 0]);
                }
            }
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_exito', 'Registros de la Tabla Sistemas Agroforestales subidos al servidor Exitosamente');
            return true;
        }else{
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_error', 'No hay Registros para subir al servidor');
            return false;
        }
    }

    public function cliente_podas_guardar(){
        $url = 'servicio_podas_guardar';
        $datas = \DB::table('enc_podas')->where('activo', 1)->get();
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $e = array();
                    $e['object_id'] = $value->object_id;
                    $e['form_planta'] = $value->form_planta;
                    $e['form_planta_fecha'] = $value->form_planta_fecha;
                    $e['form_planta_fecha_final'] = $value->form_planta_fecha_final;
                    $e['form_planta_foto'] = $value->form_planta_foto;
                    $e['mantenimiento'] = $value->mantenimiento;
                    $e['mantenimiento_fecha'] = $value->mantenimiento_fecha;
                    $e['mantenimiento_fecha_final'] = $value->mantenimiento_fecha_final;
                    $e['mantenimiento_foto'] = $value->mantenimiento_foto;
                    $e['sel_brotes'] = $value->sel_brotes;
                    $e['sel_brotes_fecha'] = $value->sel_brotes_fecha;
                    $e['sel_brotes_fecha_final'] = $value->sel_brotes_fecha_final;
                    $e['sel_brotes_foto'] = $value->sel_brotes_foto;
                    $e['rehabilitacion'] = $value->rehabilitacion;
                    $e['rehabilitacion_fecha'] = $value->rehabilitacion_fecha;
                    $e['rehabilitacion_fecha_final'] = $value->rehabilitacion_fecha_final;
                    $e['rehabilitacion_foto'] = $value->rehabilitacion_foto;
                    $e['renovacion'] = $value->renovacion;
                    $e['renovacion_fecha'] = $value->renovacion_fecha;
                    $e['renovacion_fecha_final'] = $value->renovacion_fecha_final;
                    $e['renovacion_foto'] = $value->renovacion_foto;
                    $e['deshoje_despunte'] = $value->deshoje_despunte;
                    $e['deshoje_despunte_fecha'] = $value->deshoje_despunte_fecha;
                    $e['deshoje_despunte_fecha_final'] = $value->deshoje_despunte_fecha_final;
                    $e['deshoje_despunte_foto'] = $value->deshoje_despunte_foto;
                    $e['created_at'] = $value->created_at;
                    $e['updated_at'] = $value->updated_at;
                    $e['activo'] = $value->activo;
                if($this->encuestas->guardar_data($e, $url)){
                    \DB::table('enc_podas')->where('id_poda', $value->id_poda )
                    ->update(['activo' => 0]);
                }
            }
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_exito', 'Registros de la Tabla Podas subidos al servidor Exitosamente');
            return true;
        }else{
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_error', 'No hay Registros para subir al servidor');
            return false;
        }
    }

    public function cliente_control_malezas_guardar(){
        $url = 'servicio_control_malezas_guardar';
        $datas = \DB::table('enc_controles_maleza')->where('activo', 1)->get();
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $e = array();
                    $e['object_id'] = $value->object_id;
                    $e['biologico'] = $value->biologico;
                    $e['biologico_fecha'] = $value->biologico_fecha;
                    $e['biologico_producto'] = $value->biologico_producto;
                    $e['quimico'] = $value->quimico;
                    $e['quimico_fecha'] = $value->quimico_fecha;
                    $e['quimico_producto'] = $value->quimico_producto;
                    $e['mecanico'] = $value->mecanico;
                    $e['mecanico_fecha'] = $value->mecanico_fecha;
                    $e['mecanico_producto'] = $value->mecanico_producto;
                    $e['created_at'] = $value->created_at;
                    $e['updated_at'] = $value->updated_at;
                    $e['activo'] = $value->activo;
                if($this->encuestas->guardar_data($e, $url)){
                    \DB::table('enc_controles_maleza')->where('id_control_maleza', $value->id_control_maleza )
                    ->update(['activo' => 0]);
                }
            }
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_exito', 'Registros de la Tabla Control de Malezas subidos al servidor Exitosamente');
            return true;
        }else{
            // return redirect('/form_cliente_cargar_datos')->with('mensaje_error', 'No hay Registros para subir al servidor');
            return false;
        }
    }

}

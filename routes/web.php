<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use GuzzleHttp\Client;

Route::get('/', function () {
    return redirect('/login');
});

// RUTAS DEL LADO DEL CLIENTE PARA SOLICITAR O GUARDAR INFORMACION
Route::get('cliente_informacion_basica_datas', 'ClienteEncuestasController@cliente_informacion_basica_datas');
Route::get('cliente_densidad_datas', 'ClienteEncuestasController@cliente_densidad_datas');
Route::get('cliente_agroforestales_datas', 'ClienteEncuestasController@cliente_agroforestales_datas');
Route::get('cliente_podas_datas', 'ClienteEncuestasController@cliente_podas_datas');
Route::get('cliente_control_malezas_datas', 'ClienteEncuestasController@cliente_control_malezas_datas');
Route::get('cliente_enfermedades_datas', 'ClienteEncuestasController@cliente_enfermedades_datas');
Route::get('cliente_plagas_datas', 'ClienteEncuestasController@cliente_plagas_datas');
Route::get('cliente_cosechas_datas', 'ClienteEncuestasController@cliente_cosechas_datas');
Route::get('cliente_post_cosechas_datas', 'ClienteEncuestasController@cliente_post_cosechas_datas');
Route::get('cliente_secados_datas', 'ClienteEncuestasController@cliente_secados_datas');
Route::get('cliente_fertilizaciones_datas', 'ClienteEncuestasController@cliente_fertilizaciones_datas');
Route::get('cliente_deficiencias_datas', 'ClienteEncuestasController@cliente_deficiencias_datas');

Route::get('cliente_cargar_datos', 'ClienteEncuestasController@cliente_cargar_datos');

Route::get('cliente_informacion_basica_guardar', 'ClienteEncuestasController@cliente_informacion_basica_guardar');
Route::get('cliente_densidad_guardar', 'ClienteEncuestasController@cliente_densidad_guardar');
Route::get('cliente_agroforestales_guardar', 'ClienteEncuestasController@cliente_agroforestales_guardar');
Route::get('cliente_podas_guardar', 'ClienteEncuestasController@cliente_podas_guardar');
Route::get('cliente_control_malezas_guardar', 'ClienteEncuestasController@cliente_control_malezas_guardar');
Route::get('cliente_enfermedades_guardar', 'ClienteEncuestasController@cliente_enfermedades_guardar');
Route::get('cliente_plagas_guardar', 'ClienteEncuestasController@cliente_plagas_guardar');
Route::get('cliente_cosechas_guardar', 'ClienteEncuestasController@cliente_cosechas_guardar');
Route::get('cliente_post_cosechas_guardar', 'ClienteEncuestasController@cliente_post_cosechas_guardar');
Route::get('cliente_secados_guardar', 'ClienteEncuestasController@cliente_secados_guardar');
Route::get('cliente_fertilizaciones_guardar', 'ClienteEncuestasController@cliente_fertilizaciones_guardar');
Route::get('cliente_deficiencias_guardar', 'ClienteEncuestasController@cliente_deficiencias_guardar');

Auth::routes();

Route::group(["middleware" => "apikey.validate"], function () {

    Route::get('datas_informacion_basica', 'ApiEncuestasController@datas_informacion_basica');
    Route::get('datas_densidad', 'ApiEncuestasController@datas_densidad');
    Route::get('datas_agroforestales', 'ApiEncuestasController@datas_agroforestales');
    Route::get('datas_podas', 'ApiEncuestasController@datas_podas');
    Route::get('datas_control_malezas', 'ApiEncuestasController@datas_control_malezas');
    Route::get('datas_enfermedades', 'ApiEncuestasController@datas_enfermedades');
    Route::get('datas_plagas', 'ApiEncuestasController@datas_plagas');
    Route::get('datas_cosechas', 'ApiEncuestasController@datas_cosechas');
    Route::get('datas_post_cosechas', 'ApiEncuestasController@datas_post_cosechas');
    Route::get('datas_secados', 'ApiEncuestasController@datas_secados');
    Route::get('datas_fertilizaciones', 'ApiEncuestasController@datas_fertilizaciones');
    Route::get('datas_deficiencias', 'ApiEncuestasController@datas_deficiencias');

    Route::post('servicio_informacion_basica_guardar', 'ApiEncuestasController@servicio_informacion_basica_guardar');
    Route::post('servicio_densidad_guardar', 'ApiEncuestasController@servicio_densidad_guardar');
    Route::post('servicio_agroforestales_guardar', 'ApiEncuestasController@servicio_agroforestales_guardar');
    Route::post('servicio_podas_guardar', 'ApiEncuestasController@servicio_podas_guardar');
    Route::post('servicio_control_malezas_guardar', 'ApiEncuestasController@servicio_control_malezas_guardar');
    Route::post('servicio_enfermedades_guardar', 'ApiEncuestasController@servicio_enfermedades_guardar');
    Route::post('servicio_plagas_guardar', 'ApiEncuestasController@servicio_plagas_guardar');
    Route::post('servicio_cosechas_guardar', 'ApiEncuestasController@servicio_cosechas_guardar');
    Route::post('servicio_post_cosechas_guardar', 'ApiEncuestasController@servicio_post_cosechas_guardar');
    Route::post('servicio_secados_guardar', 'ApiEncuestasController@servicio_secados_guardar');
    Route::post('servicio_fertilizaciones_guardar', 'ApiEncuestasController@servicio_fertilizaciones_guardar');
    Route::post('servicio_deficiencias_guardar', 'ApiEncuestasController@servicio_deficiencias_guardar');
    // Route::get('datas', 'ApiEncuestasController@datas');

    // Route::post('servicio_densidad_guardar', 'ApiEncuestasController@servicio_densidad_guardar');

    //Rutas
    // Route::get("cursos", "Api\CursoController@getCursos");
    Route::get('indexAPI', 'ServiciosController@indexAPI');
    Route::get('getResultados', 'ServiciosController@getResultados');


    //Graficas JSON
    // Route::get('presidenciales', 'GraficosController@presidenciales');

  });

Route::group(['middleware' => 'cors'], function () {
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('home_encuestas', 'FormEncuestasController@home_encuestas');
    Route::get('form_cliente_cargar_datos', 'FormEncuestasController@form_cliente_cargar_datos');
    Route::get('form_cliente_podas_control_opcion', 'FormEncuestasController@form_cliente_podas_control_opcion');

    Route::get('form_enc_controles_maleza', 'FormEncuestasController@form_enc_controles_maleza');
    Route::post('form_densidad_tabla', 'FormEncuestasController@form_densidad_tabla');
    Route::get('form_densidad_agregar', 'FormEncuestasController@form_densidad_agregar');

    Route::post('form_informacion_basica_opcion', 'FormEncuestasController@form_informacion_basica_opcion');

    Route::post('form_podas_control_opcion', 'FormEncuestasController@form_podas_control_opcion');

    Route::post('form_transformacion_opcion', 'FormEncuestasController@form_transformacion_opcion');

    Route::post('form_enfermedades_plagas_opcion', 'FormEncuestasController@form_enfermedades_plagas_opcion');

    Route::post('form_sist_agroforestales_tabla', 'FormEncuestasController@form_sist_agroforestales_tabla');

    Route::get('listado_densidad', 'FormEncuestasController@listado_densidad');

    Route::post('form_informacion_basica', 'FormEncuestasController@form_informacion_basica')->name('form_informacion_basica'); //Sirve para agregar y editar, en lugar de mostrar tabla, el controlador decide a cual vista enviar

    Route::post('form_preparacion_tabla', 'FormEncuestasController@form_preparacion_tabla');
    Route::post('form_podas_tabla', 'FormEncuestasController@form_podas_tabla');
    Route::post('form_controles_tabla', 'FormEncuestasController@form_controles_tabla');
    Route::post('form_cosecha_tabla', 'FormEncuestasController@form_cosecha_tabla');
    Route::post('form_post_cosecha_tabla', 'FormEncuestasController@form_post_cosecha_tabla');
    Route::post('form_secado_tabla', 'FormEncuestasController@form_secado_tabla');
    Route::post('form_deficiencias_tabla', 'FormEncuestasController@form_deficiencias_tabla');
    Route::post('form_enfermedades_tabla', 'FormEncuestasController@form_enfermedades_tabla');
    Route::post('form_plagas_tabla', 'FormEncuestasController@form_plagas_tabla');
    Route::post('form_fertilizacion_tabla', 'FormEncuestasController@form_fertilizacion_tabla');

    //MENU PRINCIPAL
    Route::get('mapa', 'FormEncuestasController@mapa');
    Route::get('quienes_somos', 'FormEncuestasController@quienes_somos');
    Route::get('contactos', 'FormEncuestasController@contactos');


    //FORMS AGREAGAR
    Route::get('form_densidad_agregar', 'FormEncuestasController@form_densidad_agregar')->name('form_densidad_agregar');
    Route::get('form_preparacion_agregar', 'FormEncuestasController@form_preparacion_agregar')->name('form_preparacion_agregar');

    Route::get('form_podas_agregar', 'FormEncuestasController@form_podas_agregar')->name('form_podas_agregar');
    Route::get('form_controles_agregar', 'FormEncuestasController@form_controles_agregar')->name('form_controles_agregar');
    Route::get('form_sist_agroforestales_agregar', 'FormEncuestasController@form_sist_agroforestales_agregar')->name('form_sist_agroforestales_agregar');
    Route::get('form_cosecha_agregar', 'FormEncuestasController@form_cosecha_agregar')->name('form_cosecha_agregar');
    Route::get('form_post_cosecha_agregar', 'FormEncuestasController@form_post_cosecha_agregar')->name('form_post_cosecha_agregar');
    Route::get('form_secado_agregar', 'FormEncuestasController@form_secado_agregar')->name('form_secado_agregar');
    Route::get('form_deficiencias_agregar', 'FormEncuestasController@form_deficiencias_agregar')->name('form_deficiencias_agregar');
    Route::get('form_enfermedades_agregar', 'FormEncuestasController@form_enfermedades_agregar')->name('form_enfermedades_agregar');
    Route::get('form_plagas_agregar', 'FormEncuestasController@form_plagas_agregar')->name('form_plagas_agregar');
    Route::get('form_fertilizaciones_agregar', 'FormEncuestasController@form_fertilizaciones_agregar')->name('form_fertilizaciones_agregar');


    //FORMS GUARDAR
    Route::post('informacion_basica_guardar', 'FormEncuestasController@informacion_basica_guardar')->name('informacion_basica_guardar');
    Route::post('densidad_guardar', 'FormEncuestasController@densidad_guardar')->name('densidad_guardar');
    Route::post('sist_agroforestales_guardar', 'FormEncuestasController@sist_agroforestales_guardar')->name('sist_agroforestales_guardar');
    Route::post('preparacion_guardar', 'FormEncuestasController@preparacion_guardar')->name('preparacion_guardar');
    Route::post('podas_guardar', 'FormEncuestasController@podas_guardar')->name('podas_guardar');
    Route::post('controles_guardar', 'FormEncuestasController@controles_guardar')->name('controles_guardar');
    Route::post('cosecha_guardar', 'FormEncuestasController@cosecha_guardar')->name('cosecha_guardar');
    Route::post('post_cosecha_guardar', 'FormEncuestasController@post_cosecha_guardar')->name('post_cosecha_guardar');
    Route::post('secado_guardar', 'FormEncuestasController@secado_guardar')->name('secado_guardar');
    Route::post('deficiencias_guardar', 'FormEncuestasController@deficiencias_guardar')->name('deficiencias_guardar');
    Route::post('enfermedades_guardar', 'FormEncuestasController@enfermedades_guardar')->name('enfermedades_guardar');
    Route::post('plagas_guardar', 'FormEncuestasController@plagas_guardar')->name('plagas_guardar');
    Route::post('fertilizaciones_guardar', 'FormEncuestasController@fertilizaciones_guardar')->name('fertilizaciones_guardar');



    //FORMS EDITAR
    Route::get('form_informacion_basica_editar', 'FormEncuestasController@form_informacion_basica_editar')->name('form_informacion_basica_editar');
    Route::get('form_densidad_editar/{id}', 'FormEncuestasController@form_densidad_editar')->name('form_densidad_editar');
    Route::get('form_preparacion_editar/{id}', 'FormEncuestasController@form_preparacion_editar')->name('form_preparacion_editar');
    Route::get('form_podas_editar/{id}', 'FormEncuestasController@form_podas_editar')->name('form_podas_editar');
    Route::get('form_controles_editar/{id}', 'FormEncuestasController@form_controles_editar')->name('form_controles_editar');
    Route::get('form_sist_agroforestales_editar/{id}', 'FormEncuestasController@form_sist_agroforestales_editar')->name('form_sist_agroforestales_editar');
    Route::get('form_cosecha_editar/{id}', 'FormEncuestasController@form_cosecha_editar')->name('form_cosecha_editar');
    Route::get('form_post_cosecha_editar/{id}', 'FormEncuestasController@form_post_cosecha_editar')->name('form_post_cosecha_editar');
    Route::get('form_secado_editar/{id}', 'FormEncuestasController@form_secado_editar')->name('form_secado_editar');
    Route::get('form_deficiencias_editar/{id}', 'FormEncuestasController@form_deficiencias_editar')->name('form_deficiencias_editar');
    Route::get('form_enfermedades_editar/{id}', 'FormEncuestasController@form_enfermedades_editar')->name('form_enfermedades_editar');
    Route::get('form_plagas_editar/{id}', 'FormEncuestasController@form_plagas_editar')->name('form_plagas_editar');
    Route::get('form_fertilizaciones_editar/{id}', 'FormEncuestasController@form_fertilizaciones_editar')->name('form_fertilizaciones_editar');


    //FORMS ACTUALIZAR
    Route::post('informacion_basica_actualizar', 'FormEncuestasController@informacion_basica_actualizar')->name('informacion_basica_actualizar');
    Route::post('densidad_actualizar/{id}', 'FormEncuestasController@densidad_actualizar')->name('densidad_actualizar');
    Route::post('preparacion_actualizar/{id}', 'FormEncuestasController@preparacion_actualizar')->name('preparacion_actualizar');
    Route::post('podas_actualizar/{id}', 'FormEncuestasController@podas_actualizar')->name('podas_actualizar');
    Route::post('controles_actualizar/{id}', 'FormEncuestasController@controles_actualizar')->name('controles_actualizar');
    Route::post('sist_agroforestales_actualizar/{id}', 'FormEncuestasController@sist_agroforestales_actualizar')->name('sist_agroforestales_actualizar');
    Route::post('cosecha_actualizar/{id}', 'FormEncuestasController@cosecha_actualizar')->name('cosecha_actualizar');
    Route::post('post_cosecha_actualizar/{id}', 'FormEncuestasController@post_cosecha_actualizar')->name('post_cosecha_actualizar');
    Route::post('secado_actualizar/{id}', 'FormEncuestasController@secado_actualizar')->name('secado_actualizar');
    Route::post('deficiencias_actualizar/{id}', 'FormEncuestasController@deficiencias_actualizar')->name('deficiencias_actualizar');
    Route::post('enfermedades_actualizar/{id}', 'FormEncuestasController@enfermedades_actualizar')->name('enfermedades_actualizar');
    Route::post('plagas_actualizar/{id}', 'FormEncuestasController@plagas_actualizar')->name('plagas_actualizar');
    Route::post('fertilizaciones_actualizar/{id}', 'FormEncuestasController@fertilizaciones_actualizar')->name('fertilizaciones_actualizar');

    //RUTAS AUXILIARES
    Route::get('consultaProvincias/{id_departamento}', 'FormEncuestasController@consultaProvincias');
    Route::get('consultaMunicipios/{id_provincia}', 'FormEncuestasController@consultaMunicipios');







    Route::get('/listado_personas', function (){
        return view('listado.listado_personas');
    })->name('admin.listado_personas'); // <--- este es el nombre que busca el controlador.

    Route::get('/home', 'HomeController@index');

    Route::get('form_agregar_persona', 'PersonasController@form_agregar_persona');


    //AUXILIARES
    Route::get('listado_personas', 'PersonasController@listado_personas');
    Route::resource('buscar_persona', 'PersonasController@buscar_persona');
    Route::get('form_agregar_persona', 'PersonasController@form_agregar_persona');
    Route::post('agregar_persona', 'PersonasController@agregar_persona');
    Route::get('form_editar_persona/{id_persona}', 'PersonasController@form_editar_persona');
    Route::post('editar_persona', 'PersonasController@editar_persona');
    Route::post('editar_asignacion_persona', 'PersonasController@editar_asignacion_persona');
    Route::post('baja_persona', 'PersonasController@baja_persona');
    Route::get('listado_personas_asignacion', 'PersonasController@listado_personas_asignacion');
    Route::resource('buscar_persona_asignacion', 'PersonasController@buscar_persona_asignacion');
    Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
    Route::post('crear_usuario', 'UsuariosController@crear_usuario');
    Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
    Route::post('editar_acceso', 'UsuariosController@editar_acceso');

    Route::post('crear_rol', 'UsuariosController@crear_rol');
    Route::post('crear_permiso', 'UsuariosController@crear_permiso');
    Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');

    Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
    Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');
















/*

    Route::get('form_consulta', 'ConsultasController@form_consulta');
    Route::get('consultaMesaAsignada/{recinto}', 'ConsultasController@consultaMesaAsignada');

    Route::get('delegados_mesa', 'ExcelController@delegados_mesa');
    Route::get('test_page', 'ExcelController@test_page');

    Route::get('form_pruebas', 'PruebasController@form_pruebas');
    Route::get('log_conexiones', 'PruebasController@log_conexiones');

    Route::get('form_asignacion_delegado_excel', 'ExcelController@form_asignacion_delegado_excel');


    Route::get('form_vista_recintos', 'VistasController@form_vista_recintos');


    Route::get('form_agregar_transporte', 'TransportesController@form_agregar_transporte');
    Route::post('agregar_transporte', 'TransportesController@agregar_transporte');
    Route::get('consultaSuborigen/{id_suborigen}', 'TransportesController@consultaSuborigen');
    //
    Route::get('revisar_transportes', 'TransportesController@revisar_transportes');
    //
    Route::get('listado_transportes', 'TransportesController@listado_transportes');
    Route::post('buscar_transportes', 'TransportesController@buscar_transportes');
    Route::get('revisar_transportes_asistencia', 'TransportesController@revisar_transportes_asistencia');

    Route::post('editar_evidencia_persona', 'PersonasController@editar_evidencia_persona');

    Route::get('form_baja_persona/{id_persona}', 'PersonasController@form_baja_persona');

    Route::post('detalle_editar_mesa', 'MesasController@detalle_editar_mesa');
    Route::post('detalle_editar_mesa_r', 'MesasController@detalle_editar_mesa_r');
    Route::post('detalle_editar_mesa_uninominal', 'MesasController@detalle_editar_mesa_uninominal');
    Route::post('detalle_editar_mesa_uninominal_r', 'MesasController@detalle_editar_mesa_uninominal_r');

    Route::get('form_mesas_recinto', 'MesasController@form_mesas_recinto');
    Route::post('asignar_mesas_recinto', 'MesasController@asignar_mesas_recinto');

    Route::get('detalle_presidenciales_mesa/{id_mesa}', 'MesasController@detalle_presidenciales_mesa');
    Route::get('detalle_uninominales_mesa/{id_mesa}', 'MesasController@detalle_uninominales_mesa');

    Route::get('listado_recintos_mesas', 'MesasController@listado_recintos_mesas');
    Route::resource('buscar_recintos_mesas', 'MesasController@buscar_recintos_mesas');

    Route::get('listado_distritos_responsables', 'MesasController@listado_distritos_responsables');
    Route::resource('buscar_distritos_responsables', 'MesasController@buscar_distritos_responsables');

    Route::get('listado_votacion_general', 'MesasController@listado_votacion_general');
    Route::resource('buscar_votacion_general', 'MesasController@buscar_votacion_general');

    Route::get('listado_votacion_recinto', 'MesasController@listado_votacion_recinto');
    Route::resource('buscar_votacion_recinto', 'MesasController@buscar_votacion_recinto');

    Route::get('listado_votacion_distrito', 'MesasController@listado_votacion_distrito');
    Route::resource('buscar_votacion_distrito', 'MesasController@buscar_votacion_distrito');

    Route::get('listado_votacion_circunscripcion', 'MesasController@listado_votacion_circunscripcion');
    Route::resource('buscar_votacion_circunscripcion', 'MesasController@buscar_votacion_circunscripcion');

    Route::get('votacion_general', 'GraficosController@votacion_general');
    Route::get('porcentaje_votacion_general', 'GraficosController@porcentaje_votacion_general');

    Route::get('presidenciales', 'GraficosController@presidenciales');
    Route::get('porcentaje_presidenciales', 'GraficosController@porcentaje_presidenciales');
    Route::get('form_resumen_global_por_distrito', 'GraficosController@form_resumen_global_por_distrito');

    Route::get('votacion_general_uninominales', 'GraficosController@votacion_general_uninominales');
    Route::get('uninominales_c10', 'GraficosController@uninominales_c10');
    Route::get('uninominales_c11', 'GraficosController@uninominales_c11');
    Route::get('uninominales_c12', 'GraficosController@uninominales_c12');
    Route::get('uninominales_c13', 'GraficosController@uninominales_c13');


    Route::get('form_asignar_usuario_mesa/{id_persona}', 'MesasController@form_asignar_usuario_mesa');
    Route::post('asignar_usuario_mesa', 'MesasController@asignar_usuario_mesa');
    Route::post('liberar_responsabilidad', 'MesasController@liberar_responsabilidad');

    Route::get('form_ver_recinto', 'MesasController@form_ver_recinto');

    // Route::get('ObtieneUsuarioMd5/{id_circ}/{id_distrito}/{id_recinto}', 'UsuariosController@ObtieneUsuarioMd5');
    Route::get('ObtieneUsuario/{id_persona}/', 'UsuariosController@ObtieneUsuario');

    Route::get('agregar_usuario', 'UsuariosController@agregar_usuario');
    Route::get('consultaUsuarioRegistrado/{recinto}', 'PersonasController@consultaUsuarioRegistrado');

    Route::get('consultaDistritos/{id_circunscripcion}', 'RecintosController@consultaDistritos');
    Route::get('consultaRecintos/{id_distrito}/{id_circunscripcion}', 'RecintosController@consultaRecintos');
    Route::get('consultaRecintosPorRecinto/{recinto}', 'RecintosController@consultaRecintosPorRecinto');
    Route::get('consultaSubOrigen/{id_origen}', 'PersonasController@consultaSubOrigen');
    Route::get('consultaMesasRecinto/{id_recinto}', 'MesasController@consultaMesasRecinto');
    Route::get('consultaMesasUsuario/{id_mesa}', 'MesasController@consultaMesasUsuario');
    Route::get('listado_recintos_data/{circ}', 'RecintosController@listado_recintos_data');

    Route::post('registrar_falta', 'AsistenciasController@registrar_falta');
    Route::get('form_agregar_lista_de_asistencia', 'AsistenciasController@form_agregar_lista_de_asistencia');
    Route::post('agregar_lista_de_asistencia', 'AsistenciasController@agregar_lista_de_asistencia');
    Route::get('form_listas_de_asistencia', 'AsistenciasController@form_listas_de_asistencia');
    Route::post('lista_de_asistencia_recinto', 'AsistenciasController@lista_de_asistencia_recinto');
    Route::post('lista_de_asistencia_recinto_buscar', 'AsistenciasController@lista_de_asistencia_recinto_buscar');
    Route::post('lista_de_asistencia', 'AsistenciasController@lista_de_asistencia');
    Route::post('lista_de_asistencia_buscar', 'AsistenciasController@lista_de_asistencia_buscar');
    Route::get('form_registrar_asistencia', 'AsistenciasController@form_registrar_asistencia');
    Route::post('registrar_asistencia', 'AsistenciasController@registrar_asistencia');
    Route::post('registrar_falta', 'AsistenciasController@registrar_falta');

    //Votaciones
    Route::post('llenado_emergencia', 'VotacionesController@llenado_emergencia');
    Route::post('llenado_emergencia_uninominales', 'VotacionesController@llenado_emergencia_uninominales');
    Route::get('form_llenar_mesas_emergencia_tipo', 'VotacionesController@form_llenar_mesas_emergencia_tipo');

    Route::get('form_llenado_emergencia/{id_recinto}', 'VotacionesController@form_llenado_emergencia');
    Route::get('form_llenado_emergencia_uninominales/{id_recinto}', 'VotacionesController@form_llenado_emergencia_uninominales');


    Route::get('form_votar_seleccionar_mesa', 'VotacionesController@form_votar_seleccionar_mesa');
    Route::post('form_votar_seleccionar_tipo', 'VotacionesController@form_votar_seleccionar_tipo');
    Route::post('form_votar_presidencial', 'VotacionesController@form_votar_presidencial');
    Route::post('form_votar_presidencial_partido', 'VotacionesController@form_votar_presidencial_partido');
    Route::post('votar_presidencial_partido', 'VotacionesController@votar_presidencial_partido');
    Route::post('form_votar_presidencial_nyb', 'VotacionesController@form_votar_presidencial_nyb');
    Route::post('votar_presidencial_nyb', 'VotacionesController@votar_presidencial_nyb');
    Route::post('form_votar_presidencial_subir_imagen', 'VotacionesController@form_votar_presidencial_subir_imagen');
    Route::get('form_votar_presidencial_subir_imagen_popup/{id_mesa}', 'VotacionesController@form_votar_presidencial_subir_imagen_popup');
    Route::post('votar_presidencial_subir_imagen', 'VotacionesController@votar_presidencial_subir_imagen');
    Route::post('form_votar_uninominal', 'VotacionesController@form_votar_uninominal');
    Route::post('form_votar_uninominal_partido', 'VotacionesController@form_votar_uninominal_partido');
    Route::post('votar_uninominal_partido', 'VotacionesController@votar_uninominal_partido');
    Route::post('form_votar_uninominal_nyb', 'VotacionesController@form_votar_uninominal_nyb');
    Route::post('votar_uninominal_nyb', 'VotacionesController@votar_uninominal_nyb');
    Route::post('form_votar_uninominal_subir_imagen', 'VotacionesController@form_votar_uninominal_subir_imagen');
    Route::get('form_votar_uninominal_subir_imagen_popup/{id_mesa}', 'VotacionesController@form_votar_uninominal_subir_imagen_popup');
    Route::post('votar_uninominal_subir_imagen', 'VotacionesController@votar_uninominal_subir_imagen');



    //ENCUESTAS
    Route::get('form_conteo', 'EncuestasController@form_conteo');
    Route::get('form_conteo_mujeres', 'EncuestasController@form_conteo_mujeres');
    Route::post('enviar_tres_v', 'EncuestasController@enviar_tres_v');
    Route::post('enviar_cinco_v', 'EncuestasController@enviar_cinco_v');
    Route::post('enviar_diez_v', 'EncuestasController@enviar_diez_v');
    Route::post('enviar_tres_m', 'EncuestasController@enviar_tres_m');
    Route::post('enviar_cinco_m', 'EncuestasController@enviar_cinco_m');
    Route::post('enviar_diez_m', 'EncuestasController@enviar_diez_m');

    Route::post('habilitar_encuesta', 'EncuestasController@habilitar_encuesta');
    Route::post('inhabilitar_encuesta', 'EncuestasController@inhabilitar_encuesta');
    Route::get('limpiar_registros/', 'EncuestasController@limpiar_registros');
    Route::post('truncate', 'EncuestasController@truncate');

    Route::get('form_encuesta_gastronomia', 'EncuestasController@form_encuesta_gastronomia');
    Route::post('enviar_gastronomia', 'EncuestasController@enviar_gastronomia');
    Route::get('reporte_gastronomia', 'EncuestasController@reporte_gastronomia');
    Route::get('plato_favorito', 'EncuestasController@plato_favorito');
    Route::get('plato_mas_vendido', 'EncuestasController@plato_mas_vendido');
    Route::get('reporte_plato_genero', 'EncuestasController@reporte_plato_genero');
    Route::get('plato_genero', 'EncuestasController@plato_genero');
    // Route::get('asistencia', 'EncuestasController@asistencia');
    Route::get('reporte_final', 'EncuestasController@reporte_final');


    Route::get('form_encuesta_visitante', 'EncuestasController@form_encuesta_visitante');
    Route::post('enviar_visitante', 'EncuestasController@enviar_visitante');

    Route::get('form_encuesta_literatura', 'EncuestasController@form_encuesta_literatura');
    Route::post('enviar_literatura', 'EncuestasController@enviar_literatura');

    Route::get('form_encuesta_turismo', 'EncuestasController@form_encuesta_turismo');
    Route::post('enviar_turismo', 'EncuestasController@enviar_turismo');

    Route::get('form_encuesta_productores', 'EncuestasController@form_encuesta_productores');
    Route::post('enviar_productores', 'EncuestasController@enviar_productores');

    Route::get('form_encuesta_artesania', 'EncuestasController@form_encuesta_artesania');
    Route::post('enviar_artesania', 'EncuestasController@enviar_artesania');

    Route::get('reporte_encuesta', 'EncuestasController@reporte_encuesta');
    Route::get('reporte_encuesta_gastronomia', 'EncuestasController@reporte_encuesta_gastronomia');
    Route::get('reporte_encuesta_literatura', 'EncuestasController@reporte_encuesta_literatura');
    Route::get('reporte_encuesta_turismo', 'EncuestasController@reporte_encuesta_turismo');
    Route::get('reporte_encuesta_productores', 'EncuestasController@reporte_encuesta_productores');
    Route::get('reporte_encuesta_artesania', 'EncuestasController@reporte_encuesta_artesania');

    //directorio
    Route::get('form_nuevo_contacto', 'DirectorioController@form_nuevo_contacto');
    Route::get('form_editar_contacto/{id}', 'DirectorioController@form_editar_contacto');
    Route::post('crear_contacto', 'DirectorioController@crear_contacto');
    Route::post('editar_contacto', 'DirectorioController@editar_contacto');

    // Route::post('buscar_persona', 'DirectorioController@buscar_persona');
    // Route::get('listado_personas/{filtro?}/{orden?}', 'DirectorioController@listado_personas');
    // Route::any('buscar_persona', 'DirectorioController@buscar_persona');

    Route::resource('listado_empresas', 'DirectorioController@listado_empresas');
    Route::resource('listado_empresas_data', 'DirectorioController@data_empresas');

    //Direcciones
    Route::get('/form_info_direcciones', 'VacacionController@form_info_direcciones');
    Route::get('consultaDirecciones/{id}', 'DireccionController@consultaDirecciones');

    //Unidades
    Route::get('consultaUnidades/{id}', 'UnidadesController@consultaUnidades');


    //Usuarios
    Route::get('form_agregar_usuario', 'UsuariosController@form_agregar_usuario');
    Route::get('reporte_usuarios', 'UsuariosController@reporte_usuarios');

    //Calendario
    Route::get('form_calendar', 'CalendarioController@form_calendar');
    Route::get('calendar_datos', 'CalendarioController@calendar_datos');
    Route::get('estado_calendario/{id_sol}', 'CalendarioController@estado_calendario');
    Route::get('calendar_datos_suspension/{id}', 'CalendarioController@calendar_datos_suspension');
    Route::get('calendar_datos_emergencias/{id}', 'CalendarioController@calendar_datos_emergencias');
*/

});

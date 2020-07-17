<?php

namespace App\Repositorios;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class EncuestasCafe
{
    protected $client;
    protected $api_key;

    public function __construct()
    {
        //Ruta de la base de datos
        //$base_uri = 'http://encuestas_cafe_server.test:8080';
        $base_uri = 'http://3.23.214.151:8080';

        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $base_uri,
            // You can set any number of default request options.
            // 'timeout'  => 2.0,
        ]);

        $this->api_key = 'api_key=$2y$10$ijgHm6PCsN2/G7bH0/6tzelzeas3t.2wlGTJWgDGwHJvJ.U49hH4i';
    }

    public function test_server(){
        $url = 'datas_informacion_basica';

        try {
            $response = $this->client->request('GET', '/', array(
           'headers' => null,
           'body' => null
            ));

            if($response->getStatusCode() == 200){
                return true;
            }else{
                return false;
            }

        }
        catch (RequestException $e) {
            // $response = $e->getResponse();
            // return $response->getBody();
            return false;
        }
    }

    public function datas($url){

        $response = $this->client->request('GET', $url . '?' . $this->api_key);
        // dd($response->getBody());
        return json_decode($response->getBody()->getContents());
    }

    public function guardar_data($datas, $url){

        $data =  array(
            'headers'=>array('Content-Type'=>'application/json'),
            'json'=>$datas
        );

        if($response = $this->client->post($url . '?' . $this->api_key , $data)){
            return true;
        }else{
            return false;
        }

        // return $response->getBody()->getContents();
        // return (string) $response->getBody();
    }
}
